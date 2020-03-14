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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function() {

	Route::resource('invoices', "InvoiceController");
	Route::resource('customers', "CustomerController");
	Route::resource('products', "ProductController");

	Route::get('invoices/{invoice_id}/download', 'InvoiceController@download')->name('invoices.download');

	Route::get('user/profile', function() {

	});
});