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

use App\Models\Customer\User;
use App\Models\Customer\Post;
use Hyn\Tenancy\Models\Customer;

Route::get('customers', function () {
    return Customer::all();
});
Route::get('posts', function () {
    return Post::all();
});
Route::get('users', function () {
    return User::all();
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');