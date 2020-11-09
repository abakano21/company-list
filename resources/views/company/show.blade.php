@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between border-bottom py-2">
        <h2>Company</h2>
        <div>
            <a href="{{ redirect()->back() }}" class="btn btn-secondary" title="Cancel">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                </svg>
            </a>
            
            <a href="{{ route('companies.edit', $data['company']['id']) }}" class="btn btn-primary" title="Edit">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </a>

        </div>
    </div>

    <div class="form my-3">

        <div class="row">
            <div class="mx-3 w-100">
                <h4 class="mb-3">Company details</h4>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <ul class="list-group">
                            
                            <li class="list-group-item">
                                <p class="header">ID:</p>
                                <p class="body">{{ $data['company']['id'] }}</p>
                            </li>

                            <li class="list-group-item">
                                <p class="header">Name:</p>
                                <p class="body">{{ $data['company']['name'] }}</p>
                            </li>

                        </ul>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <p class="header">Status:</p>
                                <p class="body">
                                    @if($data['company']['status'] == 1)
                                    <svg class="icon text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    @else
                                    <svg class="icon text-danger" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    @endif
                                </p>
                            </li>

                            <li class="list-group-item">
                                <p class="header">Email:</p>
                                <p class="body">{{ $data['company']['email'] }}</p>
                            </li>
                        </ul>

                    </div>

                </div>

                <div class="row mt-3">
                    <div class="col-3">
                        <img src="{{ Storage::url($data['company']['image']) }}" alt="company photo" class="img-thumbnail">
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-lg-6 col-md-6">
                        <ul class="list-group">
                            
                            <li class="list-group-item">
                                <p class="header">Longitude:</p>
                                <p class="body">{{ $data['company']['longitude'] }}</p>
                            </li>

                            <li class="list-group-item">
                                <p class="header">Latitude:</p>
                                <p class="body">{{ $data['company']['latitude'] }}</p>
                            </li>

                            <li class="list-group-item">
                                <p class="header">Industry:</p>
                                <p class="body">@json($data['company']['industry'])</p>
                            </li>

                        </ul>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <ul class="list-group">

                            <li class="list-group-item">
                                <p class="header">Description:</p>
                                <p class="body">{{ $data['company']['description'] }}</p>
                            </li>

                            <li class="list-group-item">
                                <p class="header">Type:</p>
                                <p class="body">{{ $data['company']['type'] }}</p>
                            </li>

                            <li class="list-group-item">
                                <p class="header">Level:</p>
                                <p class="body">{{ $data['company']['level'] }}</p>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
