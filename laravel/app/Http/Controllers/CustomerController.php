<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\Order;

class CustomerController extends Controller
{
    public function show()
    {
        $customers = Customer::with('workers', 'orders')->get();
        $workers = Worker::all();
        $orders = Order::all();
        return view('customer.show', ['customers' => $customers, 'workers' => $workers, 'orders' => $orders]);
    }
    public function add()
    {
        return view('customer.create');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $customer = new Customer;
        $customer->name = $validatedData['name'];

        $customer->save();


        return redirect('/');
    }

    public function edit($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);

        return view('customer.edit', ['customer'=>$customer]);
    }

    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $customer = Customer::findOrFail($request->input('customer_id'));

        $customer->name = $validatedData['name'];

        $customer->save();

        return redirect('/');
    }
    public function delete(Request $request)
    {
        $customer_id = $request->input('customer_id');
        $workers = Worker::where('customer_id', $customer_id)->get();
        $orders = Order::where('customer_id', $customer_id)->get();
        foreach ($workers as $worker) {
            $worker->customer_id = null;
            $worker->save();
        }
        foreach ($orders as $order) {
            $order->customer_id = null;
            $order->save();
        }

        $customer = Customer::findOrFail($customer_id);
        $customer->delete();
        return redirect('/');

    }
}
