<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ResourcesController;
use App\Http\Controllers\API\CRUDController;
use App\Http\Resources\PreuserResources;
use App\Models\Preuser;
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
Route::get('/userlist', [ResourcesController::class, 'index']);
 
Route::get('/datalist', function () {
    return new PreuserResources(Preuser::all());

    //---------------pagination-----------
    // return new PreuserResources(Preuser::paginate());
});



Route::resource('customer', CRUDController::class);


