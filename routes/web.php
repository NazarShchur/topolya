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

Route::get('/pavilions', 'PavilionController@getAll');

Route::get('/pavilions/{id}', 'PavilionController@getById');

Route::post('/createOrder', 'OrderController@createOrder');


Route::middleware('can:admin')->group(function (){
    Route::prefix('admin')->group(function (){
        Route::get('/orders', 'admin\AdminController@getAllOrders');

        Route::get('/orders/{id}', 'admin\AdminController@getOrderById');

        Route::post('/addAdditional', 'admin\AdminController@addAdditional');

        Route::post('/closeHourly', 'admin\AdminController@closeHourlyAdditional');
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
