<?php

Route::get('/', function(){
    return view('static.index');
});

// Route::get('statuses', function(){

//     $articles = \Sp\Models\Article::all();

//     $statuses = [1,2,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3];

//     foreach ($articles as $article) {
        
//         $article->status_id = $statuses[array_rand($statuses)];
//         $article->save();

//     }

//     return 'done';

// });

Route::get('categoria', '\Sp\Http\Controllers\HomeController@category');

Route::get('categorie/{category_slug}', '\Sp\Http\Controllers\CategoryController@show');


Route::get('categorie/{category_slug}/articolo/{article_id}/{article_slug}', '\Sp\Http\Controllers\ArticleController@show');


Route::get('crea-articolo', '\Sp\Http\Controllers\HomeController@create_post');
Route::get('/', '\Sp\Http\Controllers\HomeController@home');
Route::get('news', '\Sp\Http\Controllers\HomeController@news');
Route::get('lista-articoli', '\Sp\Http\Controllers\HomeController@post_list');
Route::get('profile', '\Sp\Http\Controllers\HomeController@profile');
Route::get('single', '\Sp\Http\Controllers\HomeController@single');

Route::get('@{slug}', '\Sp\Http\Controllers\UsersController@show');
include(__DIR__.'/../Sp/Routes/routes_auth.php');


Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function () {

    // Route::get('/', function(){
    //     return redirect()->to('admin/press');
    // });

    // include(__DIR__.'/../Sp/Routes/routes_images.php');

});

Route::group(array('middleware' => 'auth.sp.user'), function () {

    Route::get('dashboard', '\Sp\Http\Controllers\DashboardController@index');
    Route::get('dashboard/articoli/{id}/modifica', '\Sp\Http\Controllers\DashboardController@edit');
    Route::post('dashboard/articoli/{id}', '\Sp\Http\Controllers\DashboardController@update');

});


include(__DIR__.'/../Sp/Routes/routes_glide.php');

include(__DIR__.'/../Sp/Routes/routes_static.php');


