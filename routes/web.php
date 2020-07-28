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

Route::get('/', 'HomeController@mainPage')->name('main-page');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('customer', 'CustomerController');
Route::post('/product/saveTemp', 'InvoiceController@storeTemprary')->name('product.temp');
Route::delete('/product/temp/{temp}', 'InvoiceController@deleteTemprary')->name('product.deleteTemp');
Route::get('/confirm-invoice' , 'PaymentController@show')->name('payment.pay');
Route::post('/pay' , 'PaymentController@store')->name('payment.store');
Route::get('/invoice/extrapay/{invoice}' , 'PaymentController@extraShow')->name('payment.extraShow');
Route::post('/invoice/extrapay/{invoice}/pay' , 'PaymentController@extraPay')->name('payment.extraPay');
Route::resource('invoice', 'InvoiceController');
Route::get('/invoice/print/{invoice}' , 'InvoiceController@print')->name('invoice.print');
Route::post('/invoice/search' , 'InvoiceController@search')->name('invoice.search');
Route::get('/isfinance' , 'InvoiceController@finance')->name('invoice.finance');
Route::get('/invoice/user/{user}' , 'InvoiceController@userInvoice')->name('invoice.user');
Route::post('/saveProducts' , 'ProductController@store')->name('product.store');
Route::post('/oldjw/increase' , 'JWController@increasold')->name('oldjw.increase');
Route::post('/oldjw/dec' , 'JWController@decold')->name('oldjw.dec');
Route::post('/newjw/inc' , 'JWController@newinc')->name('newjw.increase');
Route::get('/cheque/today' , 'HomeController@todayCheques')->name('cheque.today');