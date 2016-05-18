<?php

// Route::get('/', function(){
//     return view('static.index');
// });

Route::get('categoria', '\Sp\Http\Controllers\HomeController@category');
Route::get('crea-articolo', '\Sp\Http\Controllers\HomeController@create_post');
Route::get('/', '\Sp\Http\Controllers\HomeController@home');
Route::get('news', '\Sp\Http\Controllers\HomeController@news');
Route::get('lista-articoli', '\Sp\Http\Controllers\HomeController@post_list');
Route::get('profile', '\Sp\Http\Controllers\HomeController@profile');
Route::get('single', '\Sp\Http\Controllers\HomeController@single');

include(__DIR__.'/../Sp/Routes/routes_auth.php');


Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function () {

    // Route::get('/', function(){
    //     return redirect()->to('admin/press');
    // });

    // include(__DIR__.'/../Sp/Routes/routes_images.php');

});

Route::group(array('prefix' => 'utente', 'middleware' => 'auth'), function () {

    // Route::get('/', function(){
    //     return redirect()->to('admin/press');
    // });

    // include(__DIR__.'/../Sp/Routes/routes_images.php');

});


include(__DIR__.'/../Sp/Routes/routes_glide.php');

include(__DIR__.'/../Sp/Routes/routes_static.php');


