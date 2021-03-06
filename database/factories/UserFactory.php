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
    static $password;

    return [
        'user_name' => $faker->name,
        'user_email' => $faker->unique()->safeEmail,
        'user_password' => $password ?: $password = bcrypt('secret'),
        'user_statut' => $faker->randomElement(['admin', 'client']),
        'remember_token' => str_random(10),
        'departement_id' => $faker->randomElement([1, 2, 3, 4])
    ];
});
