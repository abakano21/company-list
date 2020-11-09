@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between border-bottom py-2">
        <h2>Companies</h2>
        <a href="{{ redirect()->back() }}" class="btn btn-secondary" title="Cancel">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
            </svg>
        </a>

    </div>

    <div class="form my-3">

        <div class="row w-100">
            <div class="mx-3 w-50">
                <h4 class="mb-3">Company details</h4>
                <form action="{{ route('companies.update') }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>

                    @csrf
                    @method('PUT')

                    <input type="hidden" name="row_id" value="{{ $data['company']['id'] }}">

                    <div class="mb-3">
                        <div class="custom-control custom-checkbox">
                            <input name="status" @if($data['company']['status'] == 1) checked @endif value="1" type="checkbox" class="custom-control-input" id="status_id">
                            <label class="custom-control-label" for="status_id">Status</label>
                        </div>
                        <div class="input-group">
                            
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <div class="input-group">
                            <input name="name" type="text" value="{{ $data['company']['name'] }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input name="email" type="email" value="{{ $data['company']['email'] }}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="company@example.com">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Image</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="longitude">Longitude</label>
                            <input name="longitude" type="text" value="{{ $data['company']['longitude'] }}" class="form-control @error('longitude') is-invalid @enderror" id="longitude" placeholder="Longitude" required>
                            @error('longitude')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="latitude">Latitude</label>
                            <input name="latitude" type="text" value="{{ $data['company']['latitude'] }}" class="form-control @error('latitude') is-invalid @enderror" id="latitude" placeholder="Latitude" required>
                            @error('latitude')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ $data['company']['description'] }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <select name="type" class="form-control @error('type') is-invalid @enderror" id="type">
                          <option value="private">Private</option>
                          <option value="governmental">Governmental</option>
                          <option value="mixed">Mixed</option>
                          <option value="other">Other</option>
                        </select>
                        @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="level_head" name="level" @if($data['company']['level'] == 'head') checked @endif value="head" type="radio" class="custom-control-input" checked required>
                            <label class="custom-control-label" for="level_head">Head</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="level_branch" name="level" @if($data['company']['level'] == 'branch') checked @endif value="branch" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="level_branch">Branch</label>
                        </div>
                    </div>

                    <hr class="mb-4">

                    <h4 class="mb-3">Industries</h4>
                    
                    @foreach($data['industries'] as $industry)

                    <div class="custom-control custom-checkbox">
                        <input name="industry[]" value="{{ $industry }}" @if(in_array($industry, $data['company']['industry'])) checked @endif type="checkbox" class="custom-control-input" id="{{ $industry}}">
                        <label class="custom-control-label" for="{{ $industry }}">{{ $industry }}</label>
                    </div>
                    @endforeach

                    <hr class="mb-4">

                    <button class="btn btn-primary btn-lg" type="submit">Update</button>

                </form>
            </div>
        </div>

    </div>
@endsection
