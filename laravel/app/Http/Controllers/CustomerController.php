<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function show($id=1)
    {
        $customer = Customer::with('workers', 'orders')->findOrFail($id);

        return view('customer.show', compact('customer'));
    }
}
