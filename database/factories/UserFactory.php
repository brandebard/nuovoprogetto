<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Album;
use App\Models\Photo;
use App\Models\Statistic;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Models\Album::class, function (Faker $faker) {
    return [
        'album_name' => $faker->name,
        'description' => $faker->text(128),
        'user_id' => User::inRandomOrder()->first()->id
    ];
});

$factory->define(App\Models\Photo::class, function (Faker $faker) {
    return [
        'album_id' => Album::inRandomOrder()->first()->id,
        'name' => $faker->text(64),
        'description' => $faker->text(128),
        'img_path' => $faker->imageUrl(640,480,'cats')
    ];
});

$factory->define(App\Models\Statistic::class, function (Faker $faker) {
    return [
        'paese' => $faker->text(10),
        'valore' => $faker->unique()->randomNumber($nbDigits = 3)
    ];
});
