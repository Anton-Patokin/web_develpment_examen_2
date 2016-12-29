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

// app/Http/routes.php

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect']
    ],
    function () {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/', 'homeController@index');


        Route::get('test', function () {
            return trans('messages.welcome');
        });

        Route::get('test', function () {
            return trans('messages.welcome');
        });

        
        Route::get('/fr-nl/','LanguageController@index');
    });

Route::get('/login', 'userController@index');
Route::post('/users', 'userController@login');
Route::get('/logout','userController@logout');
Route::resource('/products','productsController');
Route::post('/add/{table}/product/{id}','productsController@add_to_product');
Route::get('/delete/{tabele}/product/{id}/{item_id}','productsController@delete_from_product');
Route::post('/update/{table}/product/{id_item}','productsController@update_on_items');