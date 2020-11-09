<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    public function create()
    {
        $data['industries'] = $this->industryArray();
        return view('company.create', compact('data'));
    }

    public function index()
    {
        $data['companies'] = Company::get();
        return view('company.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:companies|max:100',
            'email' => 'required|email',
            'image' => 'required|file|mimes:jpeg,bmp,png',
            'longitude' => 'required',
            'latitude' => 'required',
            'description' => 'required',
            'type' => 'required',
            'level' => 'required',
            'industry' => 'required',
        ]);

        $newRow = new Company();
        $newRow->name = request()->input('name');
        $newRow->email = request()->input('email');
        $newRow->longitude = request()->input('longitude');
        $newRow->latitude = request()->input('latitude');
        $newRow->description = request()->input('description');
        $newRow->type = request()->input('type');
        $newRow->level = request()->input('level');
        $newRow->industry = request()->input('industry');

        if(request()->hasFile('image')) {
            $newRow['image'] = Storage::putFile('company', request()->file('image'));
        }

        $newRow->save();

        return redirect()->route('companies.show',$newRow->id)->with('success', 'Company stored successfully');
    }

    public function show($id)
    {
        $data['company'] = Company::findOrFail($id);
        $data['industries'] = $this->industryArray();
        return view('company.show', compact('data'));
    }

    public function edit($id)
    {
        $data['company'] = Company::findOrFail($id);
        $data['industries'] = $this->industryArray();

        return view('company.edit', compact('data'));
    }

    public function update(Request $request)
    {

        $row = Company::findOrFail($request->input('row_id'));
        $request->validate([
            'name' => [
                'required',  Rule::unique('companies')->ignore($row->id),
                'max:100'
            ],            
            'email' => 'required|email',
            'longitude' => 'required',
            'latitude' => 'required',
            'description' => 'required',
            'type' => 'required',
            'level' => 'required',
            'industry' => 'required',
        ]);

        $row->status = request()->input('status') ?? 0;
        $row->name = request()->input('name');
        $row->email = request()->input('email');
        $row->longitude = request()->input('longitude');
        $row->latitude = request()->input('latitude');
        $row->description = request()->input('description');
        $row->type = request()->input('type');
        $row->level = request()->input('level');
        $row->industry = request()->input('industry');

        if(request()->hasFile('image')) {
            $row['image'] = Storage::putFile('company', request()->file('image'));
        }

        $row->save();

        return redirect()->route('companies.show',$row->id)->with('success', 'Company updated successfully');
    }

    private function industryArray()
    {
        return ['Air Transportation', 'Arts', 'Beverages', 'Chemical Manufacturing', 'Information', 'other'];
    }

}
