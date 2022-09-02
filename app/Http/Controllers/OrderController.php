<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Document;
use App\Models\Ministry;
use App\Models\MinistryDocument;
use App\Models\OrderDocument;
class OrderController extends Controller
{
    public function create(Request $request,User $user)
    {
        $ministry_documents = MinistryDocument::when($request->search, function ($q) use ($request){
            return $q->where('name',  '%' .$request->search .'%');
        })->latest()->paginate(5);
        $orders = $user->orders()->with('documents')->paginate(5);

        return view('admin.orders.create', compact( 'user','orders'));
    }
    public function store(Request $request ,User $user)
     {
        $request->validate([
            'documents'=>'required',
        ]);

        $this->attach_order($request, $user);

        session()->flash('success','added_successfully');
        return redirect()->route('orders.index');
     }
     private function attach_order($request, $user)
     {
         $order = $user->orders()->create([]);

         $order->documents()->attach($request->documents);

         $total_price = 0;

         foreach ($request->documents as $id) {

             $ministry_document = MinistryDocument::FindOrFail($id);
             $total_price += $ministry_document->price;
             
         }
         $order->update([
            'total_price' => $total_price
        ]);

     }

     public function update(Request $request,User $user , Order $order)
     {
     return $request->all();
     }
     

    
    
}
