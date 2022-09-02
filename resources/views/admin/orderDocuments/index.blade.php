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
                            <a href="#">OrderDocument</a>
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
                                <th>Order</th>
                                <th>Document</th>
                                <th>ministryDocument</th>
                                 <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($order_documents) > 0)
                                @foreach ($order_documents as $order_document)
                                    <tr>
                                        <td>{{ @$order_document->order_id }}</td>
                                        <td>{{ @$order_document->ored->name }}</td>
                                        <td>{{ @$order_document->ministry_document_id }}</td>
                                       

                                        <td>
                                            <div class="table-actions">
                                                <a href="{{ route('order_documents.edit', $order_document->id) }}"><i
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
