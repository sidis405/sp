<?php

// \DB::listen(function($sql, $bindings, $time) {
//     // logger($sql);
//     // logger($bindings);
//     // logger($time);
// });

// Route::get('payoff', function(){

//     $articles = Sp\Models\Article::where('status_id', 3)->with('visits')->get();

//     foreach($articles as $article)
//     {
//         $payoff = array_sum(array_pluck($article->visits, 'payoff'));
//         $article->payoff_counter = $payoff;
//         $article->save();
//     }

// });

Route::get('/', '\Sp\Http\Controllers\HomeController@news');

Route::get('news', '\Sp\Http\Controllers\HomeController@news');

Route::get('categorie/{category_slug}', '\Sp\Http\Controllers\CategoryController@show');

Route::get('categorie/{category_slug}/articolo/{article_id}/{article_slug}', '\Sp\Http\Controllers\ArticleController@show');


Route::get('@{slug}', '\Sp\Http\Controllers\UsersController@show');
Route::get('utente/{id}', '\Sp\Http\Controllers\UsersController@showId');

Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function () {

    Route::get('/', function(){
        return redirect()->to('/admin/dashboard');
    });
    Route::get('dashboard', '\Sp\Http\Controllers\Admin\DashboardController@index');
    Route::get('nuovi-articoli', '\Sp\Http\Controllers\Admin\ArticlesController@index_new');
    Route::get('articoli', '\Sp\Http\Controllers\Admin\ArticlesController@index');
    Route::get('articoli/{id}', '\Sp\Http\Controllers\Admin\ArticlesController@show');
    Route::get('articoli/{id}/modifica', '\Sp\Http\Controllers\Admin\ArticlesController@edit');
    Route::post('articoli/{id}', '\Sp\Http\Controllers\Admin\ArticlesController@update');


    Route::get('articoli/{id}/anteprima', '\Sp\Http\Controllers\Admin\ArticlesController@preview');
    Route::post('articoli/{id}/rating', '\Sp\Http\Controllers\Admin\ArticlesController@rating');
    Route::post('articoli/{id}/status', '\Sp\Http\Controllers\Admin\ArticlesController@status');


    Route::get('categorie', '\Sp\Http\Controllers\Admin\CategoriesController@index');

    Route::get('categorie/crea', '\Sp\Http\Controllers\Admin\CategoriesController@create');
    Route::post('categorie', '\Sp\Http\Controllers\Admin\CategoriesController@store');

    Route::get('categorie/{id}/modifica', '\Sp\Http\Controllers\Admin\CategoriesController@edit');
    Route::post('categorie/{id}', '\Sp\Http\Controllers\Admin\CategoriesController@update');
    
    Route::post('categorie/{id}/rimuovi', '\Sp\Http\Controllers\Admin\CategoriesController@destroy');


    Route::get('utenti', '\Sp\Http\Controllers\Admin\UsersController@index');
    Route::get('utenti/{id}', '\Sp\Http\Controllers\Admin\UsersController@show');

    Route::get('pagamenti', '\Sp\Http\Controllers\Admin\EarningsController@index');
    Route::get('impostazioni', '\Sp\Http\Controllers\Admin\SettingsController@index');

});

Route::group(array('middleware' => 'auth.sp.user'), function () {

    Route::get('dashboard', '\Sp\Http\Controllers\DashboardController@index');
    Route::get('guadagni-pagamenti', '\Sp\Http\Controllers\EarningsController@index');
    Route::get('dashboard/articoli/scrivi', '\Sp\Http\Controllers\DashboardController@create');
    Route::post('dashboard/articoli', '\Sp\Http\Controllers\DashboardController@store');

    Route::get('dashboard/articoli/{id}/modifica', '\Sp\Http\Controllers\DashboardController@edit');
    Route::get('dashboard/articoli/{id}/anteprima', '\Sp\Http\Controllers\DashboardController@preview');
    Route::post('dashboard/articoli/{id}', '\Sp\Http\Controllers\DashboardController@update');
    Route::post('dashboard/articoli/{id}/invia', '\Sp\Http\Controllers\DashboardController@submit');

    
    Route::get('impostazioni', '\Sp\Http\Controllers\UsersController@settings_form');
    Route::post('profilo', '\Sp\Http\Controllers\UsersController@profile_form_save');
    Route::post('password', '\Sp\Http\Controllers\UsersController@password_form_save');
    Route::post('metodi', '\Sp\Http\Controllers\UsersController@paymethods_form_save');

});

include(__DIR__.'/../Sp/Routes/routes_auth.php');

include(__DIR__.'/../Sp/Routes/routes_glide.php');

include(__DIR__.'/../Sp/Routes/routes_static.php');


