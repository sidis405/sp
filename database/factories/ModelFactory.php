<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    
    $localisedFaker = Faker\Factory::create("it_IT");

    $email = $localisedFaker->safeEmail;

    return [
        'name' => $localisedFaker->name,
        'email' => $email,
        'avatar' => $localisedFaker->imageUrl(320, 320),
        'facebook_id' => bcrypt($email),
        'password' => bcrypt($email),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Sp\Models\Article::class, function (Faker\Generator $faker) {

    $localisedFaker = Faker\Factory::create("it_IT");

    $title = $localisedFaker->sentence;

    $slug = str_slug($title);

    $users = array_pluck(App\User::all(), 'id');
    $categories = array_pluck(Sp\Models\Category::all(), 'id');


    return [
        'user_id' => $localisedFaker->randomElement($users),
        'category_id' => $localisedFaker->randomElement($categories),
        'title' => $title,
        'slug' => $slug,
        'description' => $localisedFaker->paragraph,
        'body' => $localisedFaker->paragraph(60),
        'image_path' => $localisedFaker->imageUrl(730, 350)
    ];
});
