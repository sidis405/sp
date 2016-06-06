<?php


Route::get('/', '\Sp\Http\Controllers\HomeController@home');

Route::get('news', '\Sp\Http\Controllers\HomeController@news');

Route::get('categorie/{category_slug}', '\Sp\Http\Controllers\CategoryController@show');

Route::get('categorie/{category_slug}/articolo/{article_id}/{article_slug}', '\Sp\Http\Controllers\ArticleController@show');


Route::get('@{slug}', '\Sp\Http\Controllers\UsersController@show');
Route::get('utente/{id}', '\Sp\Http\Controllers\UsersController@showId');

    Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function () {

});

Route::group(array('middleware' => 'auth.sp.user'), function () {

    Route::get('dashboard', '\Sp\Http\Controllers\DashboardController@index');
    Route::get('dashboard/articoli/scrivi', '\Sp\Http\Controllers\DashboardController@create');
    Route::post('dashboard/articoli', '\Sp\Http\Controllers\DashboardController@store');
    Route::get('dashboard/articoli/{id}/modifica', '\Sp\Http\Controllers\DashboardController@edit');
    Route::get('dashboard/articoli/{id}/anteprima', '\Sp\Http\Controllers\DashboardController@preview');
    Route::post('dashboard/articoli/{id}', '\Sp\Http\Controllers\DashboardController@update');
    
    Route::get('impostazioni', '\Sp\Http\Controllers\UsersController@settings_form');
    Route::post('profilo', '\Sp\Http\Controllers\UsersController@profile_form_save');
    Route::post('password', '\Sp\Http\Controllers\UsersController@password_form_save');
    Route::post('metodi', '\Sp\Http\Controllers\UsersController@paymethods_form_save');

});

include(__DIR__.'/../Sp/Routes/routes_auth.php');

include(__DIR__.'/../Sp/Routes/routes_glide.php');

include(__DIR__.'/../Sp/Routes/routes_static.php');


