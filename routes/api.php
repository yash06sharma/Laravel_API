<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AuthController;
// use App\Http\Middleware\EnsureCorsError;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('/register', function () {
    return view('Auth.register');
});

Route::post('/register', [AuthController::class, 'store'])->name('authreg');
Route::get('/login', function () {
    return view('Auth.login');
});
Route::post('/login', [AuthController::class, 'login'])->name('login');

// ['auth:sanctum']

Route::middleware(['validToken'])->group(function () {
    //-------------under API Auth-------------
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});






// Route::get('/adduser', [UserController::class, 'create']);
// Route::post('/adduser', [UserController::class, 'store'])->name('add');
// Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('deleted');
// Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edited');
