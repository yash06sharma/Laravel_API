<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AuthController;

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
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/register', function () {
    return view('Auth.register');
});
Route::post('/register', [AuthController::class, 'store'])->name('authreg');


Route::get('/login', function () {
    return view('Auth.login');
});

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    //-------------under API Auth-------------
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/dashboard', [UserController::class, 'dashboard']);
});


// Route::get('/adduser', [UserController::class, 'create']);
// Route::post('/adduser', [UserController::class, 'store'])->name('add');
// Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('deleted');
// Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edited');
