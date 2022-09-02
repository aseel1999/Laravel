<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ministry;

class MinistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ministries=Ministry::all();
        
        return view('admin.ministrys.index',[
            
            'ministries'=>$ministries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ministry= Ministry::all();
        return view('admin.ministrys.create',compact('ministry'));
        
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
        
       Ministry::create($data);
        session()->flash('success', 'New ministry Added Successfully.');
        
        return redirect(route('ministries.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ministry = Ministry::find($id);
        return view('admin.ministrys.index', compact('ministry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ministry = Ministry::find($id);
        
        return view('admin.ministrys.edit', compact('ministry'));

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
        $this->validateUpdate($request, $id);
        $data = $request->all();
        $ministry = Ministry::find($id);
        $ministry->update($data);
        session()->flash('success', 'New ministry Updated Successfully.');
        
        return redirect(route('ministries.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Ministry $ministry)
    {
        $ministry->delete();
        session()->flash('success','New ministry Updated Successfully.');
        return redirect()->route('ministries.index');
    }
    public function validateStore($request)
    {
        return  $this->validate($request, [
            'name' => 'required',
        ]);
    }
    public function validateUpdate($request, $id)
    {
        return  $this->validate($request, [
            'name' => 'required',
            
        ]);
    }
}
