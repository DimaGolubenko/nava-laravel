<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(
    [
        'prefix' => 'products',
        'as' => 'products.',
        'namespace' => 'Api\Product',
        //'middleware' => 'auth:api',
    ],
    function () {
        Route::get('/', 'ProductController@index')->name('index');
        Route::post('/', 'ProductController@create')->name('create');
        Route::get('/{id}', 'ProductController@show')->name('show');
        
        Route::get('sizes', 'SizeController@index')->name('sizes.index');
        Route::get('sizes/create', 'SizeController@create')->name('sizes.create');
        Route::get('sizes/{id}', 'SizeController@show')->name('sizes.show');
        
        Route::get('colors', 'ColorController@index')->name('colors.index');
        Route::get('colors/create', 'ColorController@create')->name('colors.create');
        Route::get('colors/{id}', 'ColorController@show')->name('colors.show');
    }
);

// Route::prefix('products')->group(function () {
//     Route::get('/', 'ProductController@index')->name('products.index');
//     Route::post('/', 'ProductController@create')->name('products.create');
//     Route::get('/{id}', 'ProductController@show')->name('products.show');
    
//     Route::get('sizes', 'ProductSizeController@index')->name('sizes.index');
//     Route::get('sizes/create', 'ProductSizeController@create')->name('sizes.create');
//     Route::get('sizes/{id}', 'ProductSizeController@show')->name('sizes.show');
    
//     Route::get('colors', 'ProductColorController@index')->name('colors.index');
//     Route::get('colors/create', 'ProductColorController@create')->name('colors.create');
//     Route::get('colors/{id}', 'ProductColorController@show')->name('colors.show');
// });
