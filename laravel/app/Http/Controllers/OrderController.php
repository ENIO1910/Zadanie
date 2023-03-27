<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
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
}
