<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'namespace' => 'Api\Auth'
], function () {
    Route::post('/login' , 'AuthController@login')->name('auth.login.api');
});

Route::group([
    'namespace' => 'Api\Customers' ,
    'middleware' => 'auth:api' ,
], function () {
    Route::apiResource('/customer' , 'CustomerController');
});


Route::fallback(function() {
    return response('page not found' , 404);
})->name('api.404');