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

    $name = $localisedFaker->firstName;

    $surname = $localisedFaker->lastName;

    return [
        'name' => $name,
        'surname' => $surname,
        'username' => str_slug($name . ' ' . $surname),
        'email' => $email,
        'avatar' => 'https://api.adorable.io/avatars/285/' . $email .'.png',
        // 'avatar' => 'http://fillmurray.com/320/320',
        // 'avatar' => 'http://placebeard.com/320',
        // 'avatar' => $localisedFaker->imageUrl(320, 320),
        'facebook_id' => bcrypt($email),
        'password' => bcrypt($email),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Sp\Models\Visits::class, function(Faker\Generator $faker){

    $sources = ['', '','', '','', '','', '','', '','', '','facebook.com', 'facebook.com', 'facebook.com', 'facebook.com', 'facebook.com', 'twitter.com', 'twitter.com', 'twitter.com', 'twitter.com', env('LOCAL_URL'), env('LOCAL_URL'), env('LOCAL_URL'), env('LOCAL_URL'), env('LOCAL_URL'), env('LOCAL_URL'), env('LOCAL_URL')];

    $source = $sources[array_rand(range(0, count($sources)-1))];

    $article = Sp\Models\Article::where('status_id', 3)->with('category')->orderBy(DB::raw('RAND()'))->first();



    $article->increment('view_counter'); 

    $payoff = $article->category->payoff/1000;

    // $dates = Sp\Utils\Help::createDateRangeArray('2016-06-01', Carbon\Carbon::now()->format('Y-m-d'));
    $dates = Sp\Utils\Help::createDateRangeArray('2016-09-01', '2016-09-28');

    $date = $dates[array_rand($dates)];

    return [
        'article_id' => $article->id,
        'origin' => $source,
        'payoff' => $payoff,
        'created_at' => $date,
    ];
});

$factory->define(Sp\Models\Article::class, function (Faker\Generator $faker) {

    $localisedFaker = Faker\Factory::create("it_IT");

    $title = $localisedFaker->sentence;

    $slug = str_slug($title);

    $users = array_pluck(App\User::all(), 'id');
    $categories = array_pluck(Sp\Models\Category::all(), 'id');

    $width = 730;
    $height = 350;

                // 'http://placebeard.com/width/height'
    $lorem_images = [
                'https://spaceholder.cc/widthxheight' , 
                'https://placebear.com/width/height',
                'http://fillmurray.com/width/height',
                'http://www.placecage.com/width/height',
                'http://placekitten.com/width/height',
                'http://baconmockup.com/width/height/',
                'http://placezombie.com/widthxheight'
                ];

    $provider = $lorem_images[array_rand([0, 1, 2 ,3,4,5,6])];

    $image = str_replace('height', $height, str_replace('width', $width, $provider));

    return [
        'user_id' => $localisedFaker->randomElement($users),
        'category_id' => $localisedFaker->randomElement($categories),
        'title' => $title,
        'slug' => $slug,
        'description' => $localisedFaker->paragraph,
        'body' => $localisedFaker->paragraph(60),
        'image_path' => $image
        // 'image_path' => 'http://fillmurray.com/730/350'
        // 'image_path' => 'http://placebeard.com/730/350'
        // 'image_path' => $localisedFaker->imageUrl(730, 350)
    ];
});
