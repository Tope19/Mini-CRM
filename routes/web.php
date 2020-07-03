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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout','HomeController@logout');

Route::resource('companies', 'CompanyController');
Route::match(['get','post'],'/submit-company', 'CompanyController@store')->name('submitCompany');
Route::match(['get','post'],'/edit-company/{id}','CompanyController@edit')->name('editCompany');
Route::match(['get','post'],'/update-company/{id}','CompanyController@update')->name('updateCompany');
Route::get('company-delete/{id}' , 'CompanyController@destroy')->name('deleteCompany');

Route::get('/employees', 'EmployeeController@index')->name('employees');
Route::match(['get','post'],'/submit-employee', 'EmployeeController@store')->name('submitEmployee');
Route::match(['get','post'],'/edit-employee/{id}','EmployeeController@edit')->name('editEmployee');
Route::match(['get','post'],'/update-employee/{id}','EmployeeController@update')->name('updateEmployee');
Route::get('employee-delete/{id}' , 'EmployeeController@destroy')->name('deleteEmployee');
