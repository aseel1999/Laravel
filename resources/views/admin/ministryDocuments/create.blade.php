@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>App</h5>
                    <span>add </span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('ministry_documents.index') }}">Ministry Document</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        @if (Session::has('message'))
        <div class="alert bg-success alert-success text-white text-center" role="alert">
            {{ Session::get('message') }}
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Add </h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="{{ route('ministry_documents.store') }}" method="post"
                    enctype="multipart/form-data">@csrf
                    <div class="row">
                        
                        <div class="col-lg-6">
                            <label for="">Document </label>
                        <select name="document_id" class="form-control @error('document_id') is-invalid @enderror">
                            <option value="">Please select Document</option>
                            @foreach ($documents as $document)
                                    <option value="{{ $document->id }}" >
                                        {{ $document->name }}</option>
                                @endforeach
                        </select>
                        @error('document_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>

                        <div class="col-lg-6">
                            <label for="">Ministry </label>
                        <select name="ministry_id" class="form-control @error('ministry_id') is-invalid @enderror">
                            <option value="">Please select Ministry</option>
                            @foreach ($ministries as $ministry)
                                    <option value="{{ $ministry->id }}" >
                                        {{ $ministry->name }}</option>
                                @endforeach
                        </select>
                        @error('ministry_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="">Price</label>
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                                value="{{ old('price') }}">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <button class="btn btn-light">Cancel</button>


        
    
</div>



@endsection