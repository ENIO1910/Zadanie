<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function show()
    {
        $customers = Customer::with('workers', 'orders')->get();

        return view('customer.show', compact('customers'));
    }
}
