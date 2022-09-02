@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>All</h5>
                        <span>List of All</span>
                    </div>
                </div>
            </div>
           
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">MinistryDocument</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            @if (Session::has('message'))
                <div class="alert bg-success alert-success text-white text-center" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            
            <div class="card">
                <div class="card-body ">
                    <table  class="table table-responsive">
                        <thead>
                            <tr>
                                
                                <th>Document</th>
                                <th>Ministry</th>
                                 <th>Price</th>
                                 <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($ministry_documents) > 0)
                                @foreach ($ministry_documents as $ministry_document)
                                    <tr>
                                        <td>{{ @$ministry_document->documen->name }}</td>
                                        <td>{{ @$ministry_document->minist->name }}</td>
                                        <td>{{ @$ministry_document->price }}</td>

                                        <td>
                                            <div class="table-actions">
                                                <a href="{{ route('ministry_documents.edit', $ministry_document->id) }}"><i
                                                        class="btn btn-warning ik ik-edit-2"></i></a>
                                                        
                                                         
                                            </div>
                                        </td>
                                    </tr>
                                   
                                @endforeach
                                
                            @else
                                <td>No user to display</td>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
  
@endsection
