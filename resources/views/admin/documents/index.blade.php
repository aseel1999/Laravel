@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Documents</h5>
                        <span>List of All Documents</span>
                    </div>
                </div>
            </div>
           
            <div class="col-lg-16">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Documents</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-30">
            @if (Session::has('message'))
                <div class="alert bg-success alert-success text-white text-center" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            <form action="{{ route('documents.index') }}" method="GET">
                @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="search" value="{{ request()->search }}">
                            </div>
                            
                        </div>
                    </form>
            <div class="card">
                <div class="card-body ">
                    <table id="data_table" class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Name</th>
                                 <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($documents) > 0)
                                @foreach ($documents as $document)
                                    <tr>
                                        <td>{{ $document->name }}</td>
                                        
                                        <td>
                                            <div class="table-actions">
                                                <a href="{{ route('documents.edit', $document->id) }}"><i
                                                        class="btn btn-warning ik ik-edit-2"></i></a>
                                                        <form action="{{ route('documents.destroy', $document->id) }}" method="post" style="display: inline-block">
                                                            {{ csrf_field() }}
                                                            {{ method_field('delete') }}
                                                            <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                                        </form>
                                                         
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                               
                             @else
                             <td>No document to display</td>
                           @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection
    

