<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Worker;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function add()
    {
        $customers = Customer::all();
        return view('order.create', ['customers' => $customers]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'customer_id' => 'required|integer'
        ]);

        $worker = new Order;
        $worker->name = $validatedData['name'];
        $worker->customer_id = $validatedData['customer_id'];

        $worker->save();


        return redirect('/');
    }


    public function edit($order_id)
    {
        $order = Worker::findOrFail($order_id);
        $customers = Customer::all();
        return view('order.edit', ['order'=>$order, 'customers' => $customers]);
    }

    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'customer_id' => 'required|max:255|integer',

        ]);

        $order = Order::findOrFail($request->input('order_id'));

        $order->name = $validatedData['name'];
        $order->customer_id = $validatedData['customer_id'];

        $order->save();

        return redirect('/');
    }

    public function delete(Request $request)
    {
        $car = Order::findOrFail($request->input('order_id'));
        $car->delete();
        return redirect('/');

    }
}
