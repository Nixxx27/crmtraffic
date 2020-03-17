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
    // return redirect(route('login'));
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', ['uses' => 'HomeController@index', 'as' => 'home.index']);
Route::get('/users', ['uses' => 'UserController@index', 'as' => 'users.index']);
Route::get('/customers', ['uses' => 'CustomerController@index', 'as' => 'customers.index']);
Route::get('/customers/create', ['uses' => 'CustomerController@create', 'as' => 'customers.create']);


Route::get('/profile', ['uses' => 'ProfileController@index', 'as' => 'profile.index']);


Route::get('/merchants', ['uses' => 'MerchantController@index', 'as' => 'merchants.index']);



Route::post('/customers', ['uses' => 'CustomerController@store']);
Route::post('/profile', ['uses' => 'ProfileController@store']);


Route::get('/profile/change-password', ['uses' => 'UserController@changePassword']);
Route::post('/profile/change-password', ['uses' => 'ProfileController@updatePassword']);

// Route::get('change-password', 'ChangePasswordController@index');
// Route::post('change-password', 'ChangePasswordController@store')->name('change.password');
