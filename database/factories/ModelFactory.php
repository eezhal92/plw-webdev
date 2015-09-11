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
    $name = $faker->name;

    return [
        'username' => implode('', explode(' ', strtolower($name))),
        'name' => $name,
        'email' => $faker->email,
        'avatar' => $faker->imageUrl($width = 640, $height = 480),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    $title = $faker->sentence;
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'body' => implode("\n\n", $faker->paragraphs(10)),
    ];
});

$factory->defineAs(App\Post::class, 'post-member', function (Faker\Generator $faker) {
    $title = $faker->sentence;
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'body' => implode("\n\n", $faker->paragraphs(10)),
        'member' => true
    ];
});
