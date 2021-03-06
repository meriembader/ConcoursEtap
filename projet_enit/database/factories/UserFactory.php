<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => str_random(10),
        'cin' => uniqid(),
        'email' => str_random(10) . '@gmail.com',
        'password' => bcrypt('123456'),
        'role' => 'ROLE_CANDIDAT',
    ];
});
