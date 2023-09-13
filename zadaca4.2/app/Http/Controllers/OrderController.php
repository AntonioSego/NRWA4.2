<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('orders.index',['orders'=>$orders]);
        return view('orders.index');
    }

    public function create(){
        return view('orders.create');
    }

    public function store(Request $request){
        $data  = $request->validate([
            
        'order_date'  => 'required | date' ,
        'client_name' => 'required',
        'client_contact' => 'required',
        'product_name'=> 'required',
        'noOfProducts' => 'required | numeric',
        'sub_total' => 'required',
        'vat' => 'required',
        'discount'=> 'required',
        'total_amount' => 'required ',
        'paid' => 'required',
        'due' => 'required',
        'payment_type'=> 'required',
        'payment_status' => 'required',
        'product_id' => 'required | numeric',
        'user_id' => 'required | numeric'

        ]);

        $new_data  = Order::create($data);

        if(auth()->user()->role == 'userCR'){
            return redirect('/userCR/order');
        }else{
            return redirect(route('orders.index'));
        }

    }
    public function edit(Order $order){
        return view('orders.edit',['order' => $order]);
    }

    public function update(Order $order,Request $request){
        $data  = $request->validate([
            
            'order_date'  => 'required | date' ,
            'client_name' => 'required',
            'client_contact' => 'required',
            'product_name'=> 'required',
            'noOfProducts' => 'required | numeric',
            'sub_total' => 'required',
            'vat' => 'required',
            'discount'=> 'required',
            'total_amount' => 'required ',
            'paid' => 'required',
            'due' => 'required',
            'payment_type'=> 'required',
            'payment_status' => 'required',
            'product_id' => 'required | numeric',
            'user_id' => 'required | numeric'

            ]);

            $order->update($data);
            return redirect(route('order.index'))->with('succes','Uspjesno uredjen');
            
    }

    public function destroy(Order $order){
        $order->delete();
        return redirect(route('order.index'))->with('succes','Uspjesno izbrisan');
        
    }
}
