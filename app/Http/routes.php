<?php

// Route::get('/', function(){
//     return view('static.index');
// });
Route::get('/', '\Sp\Http\Controllers\HomeController@home');

Route::get('news', '\Sp\Http\Controllers\HomeController@news');
Route::get('categoria', '\Sp\Http\Controllers\HomeController@category');
Route::get('item', '\Sp\Http\Controllers\HomeController@item');

include(__DIR__.'/../Sp/Routes/routes_auth.php');


Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function () {

    // Route::get('/', function(){
    //     return redirect()->to('admin/press');
    // });

    // include(__DIR__.'/../Sp/Routes/routes_images.php');




});



include(__DIR__.'/../Sp/Routes/routes_glide.php');

include(__DIR__.'/../Sp/Routes/routes_static.php');


