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

use DateTime as DT;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(app\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(app\Post::class, function (Faker\Generator $faker) {

    return [
        'content' => $faker->realText(200),
        'user_id' => $faker->numberBetween($min = 1, $max = 100)
    ];
});

$factory->define(app\Profile::class, function (Faker\Generator $faker) {

    return [
            'name' => $faker->firstName,
            'surname' => $faker->lastName,
           'date_of_birth' => $faker->dateTime(),
           'description' => $faker->realText(200)
    ];
});


