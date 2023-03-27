<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{

    public function add()
    {
        $customers = Customer::all();
        return view('worker.create', ['customers' => $customers]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'customer_id' => 'required|integer'
        ]);

        $worker = new Worker;
        $worker->name = $validatedData['name'];
        $worker->customer_id = $validatedData['customer_id'];

        $worker->save();


        return redirect('/');
    }

    public function edit($worker_id)
    {
        $worker = Worker::findOrFail($worker_id);
        $customers = Customer::all();
        return view('worker.edit', ['worker'=>$worker, 'customers' => $customers]);
    }

    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'customer_id' => 'required|max:255|integer',

        ]);

        $worker = Worker::findOrFail($request->input('worker_id'));

        $worker->name = $validatedData['name'];
        $worker->customer_id = $validatedData['customer_id'];

        $worker->save();

        return redirect('/');
    }

    public function delete(Request $request)
    {
        $car = Worker::findOrFail($request->input('worker_id'));
        $car->delete();
        return redirect('/');

    }
}
