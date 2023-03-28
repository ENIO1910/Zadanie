    <?php

    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get('/order/add', [\App\Http\Controllers\OrderController::class, 'add'])->name('order.add');
    Route::post('/order/create', [\App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
    Route::DELETE('/order/delete', [\App\Http\Controllers\OrderController::class, 'delete'])->name('order.delete');
    Route::get('/order/edit/{order_id}', [\App\Http\Controllers\OrderController::class, 'edit'])->name('order.edit');
    Route::post('/order/update', [\App\Http\Controllers\OrderController::class, 'update'])->name('order.update');

    Route::get('/worker/add', [\App\Http\Controllers\WorkerController::class, 'add'])->name('worker.add');
    Route::post('/worker/create', [\App\Http\Controllers\WorkerController::class, 'create'])->name('worker.create');
    Route::DELETE('/worker/delete', [\App\Http\Controllers\WorkerController::class, 'delete'])->name('worker.delete');
    Route::get('/worker/edit/{worker_id}', [\App\Http\Controllers\WorkerController::class, 'edit'])->name('worker.edit');
    Route::post('/worker/update', [\App\Http\Controllers\WorkerController::class, 'update'])->name('worker.update');


    Route::get('/customer/add', [\App\Http\Controllers\CustomerController::class, 'add'])->name('customer.add');
    Route::get('/customer/edit/{customer_id}', [\App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/customer/update', [\App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update');
    Route::post('/customer/create', [\App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');
    Route::DELETE('/customer/delete', [\App\Http\Controllers\CustomerController::class, 'delete'])->name('customer.delete');
    Route::get('/customer/{customer_id}', [\App\Http\Controllers\CustomerController::class, 'details'])->name('customer.details');

    Route::get('/users/add', [\App\Http\Controllers\UserController::class, 'show'])->name('users.add');
    Route::post('/users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::get('/users/edit/{user_id}', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::POST('/users/update', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::DELETE('/users/delete', [\App\Http\Controllers\UserController::class, 'delete'])->name('users.delete');


    Route::put('/cars', [\App\Http\Controllers\CarController::class, 'assignCarToUser'])->name('cars.users.update');
    Route::get('/cars/add', [\App\Http\Controllers\CarController::class, 'show'])->name('cars.add');

    Route::get('/cars/edit/{car_id}', [\App\Http\Controllers\CarController::class, 'edit'])->name('cars.edit');
    Route::POST('/cars/update', [\App\Http\Controllers\CarController::class, 'update'])->name('cars.update');
    Route::DELETE('/cars/delete', [\App\Http\Controllers\CarController::class, 'delete'])->name('cars.delete');
    Route::post('/cars/create', [\App\Http\Controllers\CarController::class, 'create'])->name('cars.create');

    Route::get('/checkUserCar', [\App\Http\Controllers\Controller::class, 'showAccountPage'])->name('cars.users.check');
    Route::get('/', [\App\Http\Controllers\CustomerController::class, 'show'])->name('customer.show');
    Route::get('/cars', [\App\Http\Controllers\CarController::class, 'index'])->name('cars.index');

