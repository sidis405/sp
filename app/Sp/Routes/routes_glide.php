<?php

Route::get('image/{path}', function (League\Glide\Server $server, Illuminate\Http\Request $request, $path) {

    $server->outputImage($request);

})->where('path', '.*');