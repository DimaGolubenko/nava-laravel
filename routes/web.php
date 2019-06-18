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


Route::get('/', 'HomeController@index')->name('home');
Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::group(
    [
        'prefix' => 'products',
        'as' => 'products.',
        'namespace' => 'Product',
    ],
    function () {
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('/create', 'ProductController@create')->name('create');
        Route::post('/', 'ProductController@store')->name('store');
        Route::get('/{id}', 'ProductController@show')->name('show');
        
        Route::get('/sizes', 'SizeController@index')->name('sizes.index');
        Route::get('/sizes/create', 'SizeController@create')->name('sizes.create');
        Route::post('/sizes', 'SizeController@store')->name('sizes.store');
        Route::get('/sizes/{id}', 'SizeController@show')->name('sizes.show');
        
        Route::get('/colors', 'ColorController@index')->name('colors.index');
        Route::get('/colors/create', 'ColorController@create')->name('colors.create');
        Route::post('/colors', 'ColorController@store')->name('colors.store');
        Route::get('/colors/{id}', 'ColorController@show')->name('colors.show');
    }
);

Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
        'middleware' => 'auth'
    ],
    function () {
        Route::get('/', 'HomeController@index')->name('home');

        Route::group(
            [
                //'prefix' => 'products',
                //'as' => 'products.',
                'namespace' => 'Product',
            ],
            function () {
                Route::resource('/products', 'ProductController');
                Route::get('/products/{id}/delete', 'ProductController@delete')->name('products.delete');

                
                // Route::get('/sizes', 'SizeController@index')->name('sizes.index');
                // Route::get('/sizes/create', 'SizeController@create')->name('sizes.create');
                // Route::post('/sizes', 'SizeController@store')->name('sizes.store');
                // Route::get('/sizes/{id}', 'SizeController@show')->name('sizes.show');
                
                // Route::get('/colors', 'ColorController@index')->name('colors.index');
                // Route::get('/colors/create', 'ColorController@create')->name('colors.create');
                // Route::post('/colors', 'ColorController@store')->name('colors.store');
                // Route::get('/colors/{id}', 'ColorController@show')->name('colors.show');
            }
        );
    }
);

