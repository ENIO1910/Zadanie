<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $customer = new Customer(1);

        $customer->worker();

    }

    public function showAccountPage(Request $request)
    {
        $user = User::findOrFail($request->input('search_user_id'));

        if ($user->isUsingCar()) {
            $message = "You are currently using a car";
        } else {
            $message = "You are not currently using a car";
        }

        return view('zad2.show', ['user' => $user, 'message' => $message]);
    }

}
