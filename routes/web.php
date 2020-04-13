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
})->name('products.welcome');

Route::get('/listado', function () {
    return view('listado');
})->name('transactions.listado');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {

    //rutas transacciones
    Route::get('transactions','TransactionController@list')->name('transactions.list');
    Route::get('transactions/{product}','TransactionController@index')->name('transactions.index');
    Route::get('transactions/{product}/create','TransactionController@create')->name('transactions.create');
    Route::post('transactions','TransactionController@store')->name('transactions.store');
    Route::put('transactions/{product}','TransactionController@update')->name('transactions.update');
    Route::get('transactions/{product}/edit','TransactionController@edit')->name('transactions.edit');
    Route::get('transactions/{product}/quote','TransactionController@quote')->name('transactions.quote');
    Route::delete('transactions/{product}','TransactionController@destroy')->name('transactions.destroy');
    //rutas de productos
    Route::get('products','ProductController@index')->name('products.index');
    Route::get('products/paginacion','ProductController@paginacion')->name('products.paginacion');
    Route::get('products/buscador','ProductController@buscar')->name('products.buscar');
    Route::get('products/create','ProductController@create')->name('products.create');
    Route::post('products','ProductController@store')->name('products.store');
    Route::get('products/{product}','ProductController@show')->name('products.show');
    Route::put('products/{product}','ProductController@update')->name('products.update');
    Route::get('products/{product}/edit','ProductController@edit')->name('products.edit');
    Route::delete('products/{product}','ProductController@destroy')->name('products.destroy');
    //Route::resource('products','ProductController');
    Route::resource('details','DetailsController');
    Route::resource('category','CategoryController');
    
   
    //--
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    //ruta notavailable
    Route::resource('notavailables','NotAvailableController');
    
});



