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

Route::get('/','pagesController@index');

Auth::routes();
Route::get('/logout','Auth\loginController@logout')->name('logout');
Route::resource('/customer','customerController');
Route::get('verifyEmail','Auth\RegisterController@verifyEmail')->name('verifyEmail');
Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/addCustomer','ajaxController@addCustomer');
Route::get('/manageCustomers','pagesController@manageCustomers')->name('manageCustomers');
Route::resource('/guarantor','guarantorController');
Route::post('/addGuarantor','ajaxController@addGuarantor');
Route::get('/uploadGuarantorDocuments','pagesController@uploadGuarantorDocuments')->name('uploadGuarantorDocuments');
Route::get('uploadCustomerDocuments','pagesController@uploadCustomerDocuments')->name('uploadCustomerDocuments');
Route::get('/addloan/{id}',['uses'=>'pagesController@addLoan']);
Route::post('/addCustomerLoan','ajaxController@addCustomerLoan');
Route::get('/approveLoan','pagesController@approveLoan')->name('Approve Loans');
Route::post('/changeStatus','ajaxController@changeStatus');
Route::post('/pay_emi','ajaxController@pay_emi');
Route::post('/due_payment','ajaxController@due_payment');
