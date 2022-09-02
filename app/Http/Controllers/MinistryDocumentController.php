<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MinistryDocument;
use App\Models\Document;
use App\Models\Ministry;
class MinistryDocumentController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ministry_documents=MinistryDocument::all();
        return view('admin.ministryDocuments.index',compact('ministry_documents'));
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ministry_document= MinistryDocument::all();
        $documents=Document::all();
        $ministries=Ministry::all();
        return view('admin.ministryDocuments.create',compact('ministry_document','documents','ministries'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validateStore($request);
        $data = $request->all();
        MinistryDocument::create($data);
        session()->flash('success', ' Added Successfully.');
        
        return redirect(route('ministry_documents.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ministry_document = MinistryDocument::find($id);
        return view('admin.ministryDocuments.index', compact('ministry_document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ministry_document = MinistryDocument::find($id);
        
        return view('admin.ministryDocuments.edit', compact('ministry_document'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate =  $request->validate([
            
            'document_id'=> 'required',
            'ministry_id'=>'required',
            'price'=>'required',
        ]);
        $ministry_document = MinistryDocument::find($id);

        // this name from db            this $request->service from input
        
        $ministry_document->document_id = $request->document_id;
        $ministry_document->ministry_id = $request->ministry_id;
        $ministry_document->price=$request->price;
        $ministry_document->save();
        // flash message
        session()->flash('success', 'Updated Successfully.');
        
        return redirect(route('ministry_documents.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    public function validateStore($request)
    {
        return  $this->validate($request, [
            'document_id' => 'required',
            'ministry_id' => 'required',
            'price'=>'required|numeric',

        ]);
    }
    
    
}

    

