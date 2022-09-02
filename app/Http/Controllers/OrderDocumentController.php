<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDocument;
use App\Models\Document;
use App\Models\Order;
use App\Models\MinistryDocument;
class OrderDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order_documents=OrderDocument::all();
        return view('admin.orderDocuments.index',compact('order_documents'));
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order_document= OrderDocument::all();
        $documents=Document::all();
        $orders=Order::all();
        $ministry_documents=MinistryDocument::all();
        return view('admin.orderDocuments.create',compact('order_document','documents','orders','ministry_documents'));
        
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
        OrderDocument::create($data);
        session()->flash('success', ' Added Successfully.');
        
        return redirect(route('order_documents.index'));
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
        $order_document =OrderDocument::find($id);
        
        return view('admin.orderDocuments.edit', compact('order_document'));

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
            'order_id'=>'required',
            'document_id'=> 'required',
            'ministry_document_id'=>'required',
            
        ]);
        $order_document = OrderDocument::find($id);

        // this name from db            this $request->service from input
        $order_document->order_id = $request->order_id;
        $order_document->document_id = $request->document_id;
        $order_document->ministry_document_id = $request->ministry_document_id;
       
        $order_document->save();
        // flash message
        session()->flash('success', 'Updated Successfully.');
        
        return redirect(route('order_documents.index'));
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
           'order_id'=>'required',
            'document_id' => 'required',
            'ministry_document_id' => 'required',
            

        ]);
    }
    
    
    

}
