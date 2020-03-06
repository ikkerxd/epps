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

/*
Route::get('role_test', function () {
    return Spatie\Permission\Models\Role::with('users')->get();
});*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {

    Route::get('products','ProductController@index')->name('products.index');
    Route::get('products/create','ProductController@create')->name('products.create');
    Route::post('products','ProductController@store')->name('products.store');
    Route::get('products/{product}','ProductController@show')->name('products.show');
    Route::put('products/{product}','ProductController@update')->name('products.update');
    Route::get('products/{product}/edit','ProductController@edit')->name('products.edit');
    Route::delete('products/{product}','ProductController@destroy')->name('products.destroy');
    //Route::resource('products','ProductController');
    Route::resource('category','CategoryController');
    Route::resource('transactions','TransactionController');
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    
});



