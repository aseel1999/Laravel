<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ministry;
use App\Models\Document;

class DocumentController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $documents=Document::all();
       return view('admin.documents.index', compact('documents'));
      
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $document = Document::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        
        session()->flash('success', 'New Document Added Successfully.');
        
        return redirect(route('documents.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::find($id);
        return view('admin.documents.index', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
       // $doctor = Doctor::findOrFail($id);
       
        return view('admin.documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validate =  $request->validate([
            'name'=>'required',
            'price'=> 'required'
        ]);
        $document = Document::find($id);

        // this name from db            this $request->service from input
        $document->name = $request->name;
        $document->price=$request->price;
        $document->save();
        // flash message
        session()->flash('success', 'Document Info Updated Successfully.');
        // redirect 
        return redirect(route('documents.index'));
        
    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        session()->flash('success','Deleted successfully');
        return redirect()->route('documents.index');
    }
    
    
}

    

