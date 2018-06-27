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
Route::post('/guarantorEdit','ajaxController@guarantorEdit');
Route::post('/collateralEdit','ajaxController@collateralEdit');
Route::get('manageGuarantors','pagesController@manageGuarantors')->name('Manage Guarantors');
Route::get('/uploadGuarantorDocuments','pagesController@uploadGuarantorDocuments')->name('uploadGuarantorDocuments');
Route::get('uploadCustomerDocuments','pagesController@uploadCustomerDocuments')->name('uploadCustomerDocuments');
Route::get('/addloan/{id}',['uses'=>'pagesController@addLoan']);
Route::post('/addCustomerLoan','ajaxController@addCustomerLoan'); 
Route::get('/approveLoan','pagesController@approveLoan')->name('Approve Loans');
Route::post('/changeStatus','ajaxController@changeStatus');
Route::post('/changeUserStatus','ajaxController@changeUserStatus');
Route::post('/pay_emi','ajaxController@pay_emi');
Route::post('/due_payment','ajaxController@due_payment');
Route::post('/due_payment_sms','ajaxController@due_payment_sms');
Route::resource('/makePayment','makePaymentController');
Route::get('/loanType/{id}','pagesController@loanType')->name('Loan Type');
Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/auth/password/changePassword','changePasswordController@postChangePassword');
Route::get('/addLoanType','pagesController@addLoanType')->name('Add Loan Type');
Route::get('manageLoanType','pagesController@manageLoanType')->name('Manage All Loan Types');
Route::post('/ajaxAddLoanType','ajaxController@addLoanType');
Route::get('manageUsers','pagesController@manageUsers');
Route::post('updateGuarantor','updateController@updateGuarantor');
Route::post('updateCollateral','updateController@updateCollateral');
Route::get('runningLoans','reportController@running');
Route::get('/invoice/running/{id}','invoiceController@running')->name('Invoice');
Route::get('/print/invoice/running/{id}','invoiceController@printRunning');
Route::get('/manageBranch','pagesController@manageBranch')->name('Manage Branch');
Route::get('/addBranch','pagesController@addBranch')->name('Add Branch');
Route::post('/ajaxAddBranch','ajaxController@addBranch');
Route::post('updateBranch','updateController@updateBranch');
Route::post('/branchEdit','ajaxController@branchEdit');
Route::get('/admin/users/add','adminController@addUser')->name('Add User');
Route::get('/admin/users/manage','adminController@manageUser')->name('Manage User');
Route::get('/collateral/add','pagesController@addCollateral')->name('Add Collateral');
Route::get('/collateral/manage','pagesController@manageCollateral')->name('Manage Collateral');
Route::resource('/collateral','collateralController');
Route::get('manageDefaulters','pagesController@manageDefaulters')->name('Manage Defaulters');