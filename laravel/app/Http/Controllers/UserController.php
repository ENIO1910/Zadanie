<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use App\Models\Car;


class UserController extends Controller
{
    public function show()
    {
        return view('user.create');
    }

    public function edit($user_id): View
    {
        $user = User::findOrFail($user_id);

        return view('user.edit', ['user'=>$user]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'password' => 'required|max:255',

        ]);

        $user = User::findOrFail($request->input('user_id'));

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->save();

        return redirect('/cars');

    }


    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'password' => 'required|max:255',

        ]);

        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];

        $user->save();


        return redirect('/cars');
    }

    public function delete(Request $request)
    {
        $user_id = $request->input('user_id');
        $cars = Car::where('user_id', $user_id)->get();

        foreach ($cars as $car) {
            $car->user_id = null;
            $car->save();
        }

        $user = User::findOrFail($user_id);
        $user->delete();
        return redirect('/cars');

    }

}
