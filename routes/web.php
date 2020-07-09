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


Route::middleware('can:admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/calendar', 'admin\AdminOrderController@getAllOrdersCalendar');

        Route::get('/orders', 'admin\AdminOrderController@getAllOrdersPaginated');

        Route::get('/orders/{id}', 'admin\AdminOrderController@getOrderById')->name('order');

        Route::patch('/orders/{id}', 'admin\AdminAdditionalController@turnIsPayedAddOrder');

        Route::delete('/orders/{id}', 'admin\AdminAdditionalController@deleteAddOrder');

        Route::post('/orders/{id}', 'admin\AdminOrderController@payAll');

        Route::post('/addAdditional', 'admin\AdminAdditionalController@addAdditional');

        Route::post('/closeHourly', 'admin\AdminAdditionalController@closeHourlyAdditional');

        Route::get('/editPavilions', 'admin\AdminPavilionController@getPavilions');

        Route::put('/editPavilions', 'admin\AdminPavilionController@editPavilion')->name('editPavilion');

        Route::post('/editPavilions', 'admin\AdminPavilionController@addPavilion')->name('addPavilion');

        Route::delete('/editPavilions', 'admin\AdminPavilionController@deletePavilion')->name('deletePavilion');

        Route::get('/editAdds', 'admin\AdminAdditionalController@getAdditionals')->name('getAdditionals');

        Route::put('/editAdds', 'admin\AdminAdditionalController@editAdditional')->name('editAdditional');

        Route::post('/editAdds', 'admin\AdminAdditionalController@createAdditional');

        Route::delete('/editAdds', 'admin\AdminAdditionalController@deleteAdditional');


    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
