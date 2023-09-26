<?php

use App\Http\Controllers\HallController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth:web,admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/appointment/{hall}', \App\Http\Controllers\AppointmentController::class)->name('appointment');
Route::middleware('auth:web,admin')->group(function () {

    Route::get('user/{hall}/createReq', [RequestController::class, 'create'])->name('user.createRequest');
    Route::post('user/{hall}/storeReq', [RequestController::class, 'store'])->name('user.storeRequest');

    Route::get('user/{hall}/editReq/{bookingRequest}', [RequestController::class, 'edit'])->name('user.editRequest');
    Route::put('user/{hall}/updateReq/{bookingRequest}/', [RequestController::class, 'update'])->name('user.updateRequest');
    Route::delete('user/{hall}/deleteReq/{bookingRequest}/', [RequestController::class, 'delete'])->name('user.deleteRequest');

    Route::get('user/{user}/requests', [RequestController::class, 'showUserRequests'])->name('user.showUserRequests');
    Route::get('rooms', [RequestController::class, 'rooms'])->name('rooms');
    // Route::get('/halls/search', [HallController::class, 'search'])->name('halls.search');
});

Route::middleware('auth:admin,web')->group(function () {
    Route::get('/halls/search', [HallController::class, 'search'])->name('halls.search');
});
Route::middleware('auth:admin')->group(function () {
    Route::resource('/admin/hall', HallController::class);
    Route::get('/admin/showRequests', [HallController::class, 'showRequests'])->name('showRequests');
    Route::put('/admin/showRequests/{bookingRequest}/', [RequestController::class, 'requestStatus'])->name('requestStatus');
});

//require __DIR__.'/auth.php';

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/request/{hall}',[\App\Http\Controllers\RequestController::class,'addRequest'])->name('user.request'); 


// Route::get('index', [AdminController::class, 'craete'])->name('admin.create');
// Route::post('index', [AdminController::class, 'store'])->name('admin.store');
