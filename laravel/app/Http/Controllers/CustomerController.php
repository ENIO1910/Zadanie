<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function show()
    {
        $customers = Customer::with('workers', 'orders')->get();

        return view('customer.show', compact('customers'));
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
}
