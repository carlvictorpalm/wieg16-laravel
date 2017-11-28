<?php

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

Route::get('/customers', 'CustomerController@showCustomers');

Route::get('/customers/{id}', 'CustomerController@showIdCustomer');

Route::get('/companies', 'CustomerController@showCompanies');


Route::get('/customers/bycompany/{id}', 'CustomerController@showCompaniesId');

Route::get('/customers/{id}/address', 'CustomerController@showCustomerAddress');

