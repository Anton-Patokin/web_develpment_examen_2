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
        Route::get('/', 'HomeController@index');


        Route::get('test', function () {
            return trans('messages.welcome');
        });
        Route::get('test', function () {
            return trans('messages.welcome');
        });
        Route::get('/fr-nl/','LanguageController@index');
        Route::get('/product/{category}','HomeController@show_category_product');
        Route::get('/product/{category}/{id}','HomeController@show_product');
        Route::get('/about-us','HomeController@about_us');
        Route::get('/search/faq/{string}','FaqController@show_users_faq');
        Route::get('/search/items','SearchController@index');
        Route::get('/search/filter/items','SearchController@search')->where(['price_1' => '^[a-zA-Z0-9_.-]*$',
            'price_2' => '^[a-zA-Z0-9_.-]*$','string' => '^[a-zA-Z0-9_.-]*$','page' => '^[a-zA-Z0-9_.-]*$']);
       

    });


Route::resource('/products','productsController');
Route::post('/add/{table}/product/{id}','productsController@add_to_product');
Route::get('/delete/{tabele}/product/{id}/{item_id}','productsController@delete_from_product');
Route::post('/update/product/{id_item}','productsController@update_on_items');
Route::post('/subscribe','subscribeController@add_subscriber');
Route::get('/set_cookie','subscribeController@set_cookie');
Route::get('/login', 'userController@index');
Route::post('/users', 'userController@login');
Route::get('/logout','userController@logout');
Route::get('test', function () {
    return view('user.login');
});
Route::post('/about_us' , 'AboutUsController@send_mail');
<<<<<<< HEAD
Route::get('/faq','FaqController@index');
Route::post('/add/faq','FaqController@add_faq');
Route::get('/get/faq/{room}/{id}','FaqController@get_faq');
Route::post('/edit/faq/{room}/{id}','FaqController@edit_faq');
Route::get('/delete/faq/{room}/{id}','FaqController@delete_faq');





//Route::get('/search/faq/{string}','ApiController@search_faq');
||||||| merged common ancestors
Route::get('//faq','FaqController@index');
Route::post('/add/faq','FaqController@add_faq');
=======
Route::get('/faq','FaqController@index');
Route::post('/add/faq','FaqController@add_faq');
Route::get('/get/faq/{room}/{id}','FaqController@get_faq');
Route::post('/edit/faq/{room}/{id}','FaqController@edit_faq');
Route::get('/delete/faq/{room}/{id}','FaqController@delete_faq');
>>>>>>> 8048114a3f2800fb884d94eee303ed7775a583dc
