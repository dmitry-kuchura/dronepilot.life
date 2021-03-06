<?php

/*
|--------------------------------------------------------------------------
| Admin panel Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Admin\MainController@index')->name('dashboard');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'Admin\MainController@index')->name('dashboard');
    Route::get('/dashboard', 'Admin\MainController@index')->name('dashboard');

    Route::prefix('blog')->group(function () {
        Route::get('/', 'Admin\BlogController@index')->name('blog.list');
        Route::get('/create', 'Admin\BlogController@create')->name('blog.create');
        Route::post('/store', 'Admin\BlogController@store')->name('blog.store');
        Route::get('/edit/{id}', 'Admin\BlogController@edit')->name('blog.edit');
        Route::post('/update/{id}', 'Admin\BlogController@update')->name('blog.update');
        Route::get('/delete/{id}', 'Admin\BlogController@delete')->name('blog.delete');
    });

    Route::prefix('map')->group(function () {
        Route::get('/', 'Admin\MapController@index')->name('map.list');
        Route::get('/create', 'Admin\MapController@create')->name('map.create');
        Route::post('/store', 'Admin\MapController@store')->name('map.store');
        Route::get('/edit/{id}', 'Admin\MapController@edit')->name('map.edit');
        Route::post('/update/{id}', 'Admin\MapController@update')->name('map.update');
        Route::get('/delete/{id}', 'Admin\MapController@delete')->name('map.delete');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', 'Admin\CategoriesController@index')->name('categories.list');
        Route::get('/create', 'Admin\CategoriesController@create')->name('categories.create');
        Route::post('/store', 'Admin\CategoriesController@store')->name('categories.store');
        Route::get('/edit/{id}', 'Admin\CategoriesController@edit')->name('categories.edit');
        Route::post('/update/{id}', 'Admin\CategoriesController@update')->name('categories.update');
        Route::get('/delete/{id}', 'Admin\CategoriesController@delete')->name('categories.delete');
    });

    Route::prefix('tags')->group(function () {
        Route::get('/', 'Admin\TagsController@index')->name('tags.list');
        Route::get('/create', 'Admin\TagsController@create')->name('tags.create');
        Route::post('/store', 'Admin\TagsController@store')->name('tags.store');
        Route::get('/edit/{id}', 'Admin\TagsController@edit')->name('tags.edit');
        Route::post('/update/{id}', 'Admin\TagsController@update')->name('tags.update');
        Route::get('/delete/{id}', 'Admin\TagsController@delete')->name('tags.delete');
    });

    Route::prefix('subscribers')->group(function () {
        Route::get('/', 'Admin\SubscribersController@index')->name('subscribers.list');
        Route::get('/change-status/{id}', 'Admin\SubscribersController@changeStatus')->name('subscribers.change-status');
        Route::get('/delete/{id}', 'Admin\SubscribersController@delete')->name('subscribers.delete');
    });

    Route::prefix('statistics')->group(function () {
        Route::get('/', 'Admin\StatisticsController@index')->name('statistics.list');
    });

    Route::prefix('settings')->group(function () {
        Route::get('/', 'Admin\SettingsController@index')->name('settings.list');
        Route::get('/delete/{id}', 'Admin\SettingsController@delete')->name('settings.delete');
    });

    Route::prefix('contacts')->group(function () {
        Route::get('/', 'Admin\ContactsController@index')->name('contacts.list');
        Route::get('/show/{id}', 'Admin\ContactsController@show')->name('contacts.show');
        Route::post('/reply/{id}', 'Admin\ContactsController@reply')->name('contacts.reply');
        Route::get('/change-status/{id}', 'Admin\ContactsController@changeStatus')->name('contacts.change-status');
        Route::get('/delete/{id}', 'Admin\ContactsController@delete')->name('contacts.delete');
    });
});
