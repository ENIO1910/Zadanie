<?php

namespace App\Http\Controllers;

use App\Notifications\CarAssignedNotification;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class CarController extends Controller
{

    public function index(){

        $cars = Car::all();
        $users = User::all();

        return view('zad2.index', ['cars' => $cars, 'users' => $users]);
    }

    public function show(): View
    {
        return view('zad2.create');
    }

    public function edit($car_id): View
    {
        $car = Car::findOrFail($car_id);

        return view('zad2.edit', ['car'=>$car]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'brand' => 'required|max:255',
            'model' => 'required|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
        ]);

        $car = Car::findOrFail($request->input('car_id'));

        $car->brand = $validatedData['brand'];
        $car->model = $validatedData['model'];
        $car->year = $validatedData['year'];
        $car->save();
        return redirect('/cars');

    }

    public function delete(Request $request)
    {
        $car = Car::findOrFail($request->input('car_id'));
        $car->delete();
        return redirect('/cars');

    }
    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'brand' => 'required|max:255',
            'model' => 'required|max:255',
            'year' => 'required|integer',
        ]);

        // Create a new car with the validated data
        $car = new Car;
        $car->brand = $validatedData['brand'];
        $car->model = $validatedData['model'];
        $car->year = $validatedData['year'];
        $car->save();


        return redirect('/cars');
    }

    /**
     * Przypisanie od użytkownika do samochodu
     * @param Request $request
     * @param $carId
     * @param $userId
     * @return \Illuminate\Http\JsonResponse
     */
    public function assignCarToUser(Request $request)
    {
        $car = Car::findOrFail($request->input('car_id'));
        $user = User::findOrFail($request->input('user_id'));

        $car->user_id = $user->id;
        $user->notify(new CarAssignedNotification($car, $user));
        $car->save();

        return response()->json(['message' => 'Car assigned to user successfully', 'user'=>$user->name]);
    }



}
