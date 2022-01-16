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
  return view('index');
});
//designation
Route::get('/designation', 'App\Http\Controllers\DesignationController@index')->name('designation.index');
Route::get('designation_create', 'App\Http\Controllers\DesignationController@create')->name('designation.create');
Route::post('designation-store', 'App\Http\Controllers\DesignationController@store')->name('designation.store');
Route::get('designation_edit/{id}', 'App\Http\Controllers\DesignationController@edit')->name('designation.edit');
Route::get('designation_show/{id}', 'App\Http\Controllers\DesignationController@show')->name('designation.show');
Route::get('designation_delete/{id}', 'App\Http\Controllers\DesignationController@destroy')->name('designation.delete');
Route::put('designation_update', 'App\Http\Controllers\DesignationController@update')->name('designation.update');
//employe

Route::get('/employee', 'App\Http\Controllers\EmployeesController@index')->name('employee.index');
Route::get('employee_create', 'App\Http\Controllers\EmployeesController@create')->name('employee.create');
Route::post('employee_store', 'App\Http\Controllers\EmployeesController@store')->name('employee.store');
Route::get('employee_edit/{id}', 'App\Http\Controllers\EmployeesController@edit')->name('employee.edit');
Route::get('employee_show/{id}', 'App\Http\Controllers\EmployeesController@show')->name('employee.show');
Route::get('employee_delete/{id}', 'App\Http\Controllers\EmployeesController@destroy')->name('employee.delete');
Route::put('/employee-update', 'App\Http\Controllers\EmployeesController@update')->name('employee.update');
Route::get('/employee_search', 'App\Http\Controllers\EmployeesController@employee_search')->name('employee_search');
