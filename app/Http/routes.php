<?php

// \Auth::loginUsingId(36);

Route::get('/', '\Sp\Http\Controllers\HomeController@news');
Route::get('/home', '\Sp\Http\Controllers\HomeController@home');

Route::get('news', '\Sp\Http\Controllers\HomeController@news');

Route::get('categorie/{category_slug}', '\Sp\Http\Controllers\CategoryController@show');

Route::get('tag/{tag}', '\Sp\Http\Controllers\TagsController@show');

Route::get('categorie/{category_slug}/articolo/{article_id}/{article_slug}', '\Sp\Http\Controllers\ArticleController@show');


Route::get('@{slug}', '\Sp\Http\Controllers\UsersController@show');
Route::get('utente/{id}', '\Sp\Http\Controllers\UsersController@showId');

Route::get('ricerca', '\Sp\Http\Controllers\SearchController@search');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return redirect()->to('/admin/dashboard');
    });

    Route::get('impostazioni', '\Sp\Http\Controllers\Admin\SettingsController@edit');
    Route::post('impostazioni', '\Sp\Http\Controllers\Admin\SettingsController@update');

    Route::get('dashboard', '\Sp\Http\Controllers\Admin\DashboardController@index');
    Route::get('nuovi-articoli', '\Sp\Http\Controllers\Admin\ArticlesController@index_new');
    Route::get('articoli', '\Sp\Http\Controllers\Admin\ArticlesController@index');
    Route::get('articoli/{id}', '\Sp\Http\Controllers\Admin\ArticlesController@show');
    Route::get('articoli/{id}/modifica', '\Sp\Http\Controllers\Admin\ArticlesController@edit');
    Route::post('articoli/{id}', '\Sp\Http\Controllers\Admin\ArticlesController@update');
    Route::get('articoli/{id}/rimuovi', '\Sp\Http\Controllers\Admin\ArticlesController@destroy');


    Route::get('articoli/{id}/anteprima', '\Sp\Http\Controllers\Admin\ArticlesController@preview');
    Route::post('articoli/{id}/rating', '\Sp\Http\Controllers\Admin\ArticlesController@rating');
    Route::post('articoli/{id}/status', '\Sp\Http\Controllers\Admin\ArticlesController@status');


    Route::get('categorie', '\Sp\Http\Controllers\Admin\CategoriesController@index');

    Route::get('categorie/crea', '\Sp\Http\Controllers\Admin\CategoriesController@create');
    Route::post('categorie', '\Sp\Http\Controllers\Admin\CategoriesController@store');

    Route::get('categorie/{id}/modifica', '\Sp\Http\Controllers\Admin\CategoriesController@edit');
    Route::post('categorie/{id}', '\Sp\Http\Controllers\Admin\CategoriesController@update');

    Route::post('categorie/{id}/rimuovi', '\Sp\Http\Controllers\Admin\CategoriesController@destroy');

    Route::get('ads', '\Sp\Http\Controllers\Admin\AdsController@index');
    Route::get('ads/{id}/modifica', '\Sp\Http\Controllers\Admin\AdsController@edit');
    Route::post('ads/{id}', '\Sp\Http\Controllers\Admin\AdsController@update');





    Route::get('utenti', '\Sp\Http\Controllers\Admin\UsersController@index');
    Route::get('utenti/{id}', '\Sp\Http\Controllers\Admin\UsersController@show');
    Route::get('utenti/cancella/{id}', '\Sp\Http\Controllers\Admin\UsersController@destroy');
    Route::get('utenti/{id}/{status}', '\Sp\Http\Controllers\Admin\UsersController@update');

    Route::get('amministratori/crea', '\Sp\Http\Controllers\Admin\AdminsController@create');
    Route::get('amministratori/{id}', '\Sp\Http\Controllers\Admin\AdminsController@show');
    Route::post('amministratori', '\Sp\Http\Controllers\Admin\AdminsController@store');
    Route::get('amministratori', '\Sp\Http\Controllers\Admin\AdminsController@index');
    Route::get('amministratori/cancella/{id}', '\Sp\Http\Controllers\Admin\AdminsController@destroy');
    Route::get('amministratori/{id}/{status}', '\Sp\Http\Controllers\Admin\AdminsController@update');

    Route::get('pagamenti', '\Sp\Http\Controllers\Admin\EarningsController@index');
    Route::get('pagamenti/{id}', '\Sp\Http\Controllers\Admin\EarningsController@show');
    Route::post('pagamenti/{id}', '\Sp\Http\Controllers\Admin\EarningsController@update');

    Route::get('argomenti', '\Sp\Http\Controllers\Admin\TopicsController@index');
    Route::get('argomenti/crea', '\Sp\Http\Controllers\Admin\TopicsController@create');
    Route::post('argomenti', '\Sp\Http\Controllers\Admin\TopicsController@store');
    Route::get('argomenti/{id}/modifica', '\Sp\Http\Controllers\Admin\TopicsController@edit');
    Route::get('argomenti/{id}/rimuovi', '\Sp\Http\Controllers\Admin\TopicsController@destroy');
    Route::post('argomenti/{id}', '\Sp\Http\Controllers\Admin\TopicsController@update');
    // Route::delete('argomenti/{id}', '\Sp\Http\Controllers\Admin\TopicsController@destroy');
});

Route::group(['middleware' => 'auth.sp.user'], function () {
    Route::get('dashboard', '\Sp\Http\Controllers\DashboardController@index');
    Route::get('guadagni-pagamenti', '\Sp\Http\Controllers\EarningsController@index');
    Route::get('riepilogo-pagamenti', '\Sp\Http\Controllers\EarningsController@listingPerMonth');
    Route::post('riepilogo-pagamenti', '\Sp\Http\Controllers\EarningsController@makePaymentRequest');
    Route::get('dashboard/articoli/scrivi', '\Sp\Http\Controllers\DashboardController@create');
    Route::post('dashboard/articoli', '\Sp\Http\Controllers\DashboardController@store');

    Route::get('dashboard/articoli/{id}/modifica', '\Sp\Http\Controllers\DashboardController@edit');
    Route::get('dashboard/articoli/{id}/anteprima', '\Sp\Http\Controllers\DashboardController@preview');
    Route::post('dashboard/articoli/{id}', '\Sp\Http\Controllers\DashboardController@update');
    Route::post('dashboard/articoli/{id}/invia', '\Sp\Http\Controllers\DashboardController@submit');
    Route::delete('dashboard/articoli', '\Sp\Http\Controllers\DashboardController@destroy');


    Route::get('dashboard/argomenti-del-giorno', '\Sp\Http\Controllers\TopicsController@index');

    Route::get('impostazioni', '\Sp\Http\Controllers\UsersController@settings_form');
    Route::post('profilo', '\Sp\Http\Controllers\UsersController@profile_form_save');
    Route::post('password', '\Sp\Http\Controllers\UsersController@password_form_save');
    Route::post('metodi', '\Sp\Http\Controllers\UsersController@paymethods_form_save');


    Route::post('notifications/seen', '\Sp\Http\Controllers\NotificationsController@seen');
    Route::post('profilo/segui', '\Sp\Http\Controllers\FollowersController@follow');
    Route::delete('profilo/segui', '\Sp\Http\Controllers\FollowersController@unfollow');
});

include(__DIR__.'/../Sp/Routes/routes_auth.php');

include(__DIR__.'/../Sp/Routes/routes_glide.php');

include(__DIR__.'/../Sp/Routes/routes_static.php');
