<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Page;
use App\User;
use Illuminate\Support\Str;
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

$factory->define(Page::class, function (Faker $faker) {
	$user = User::inRandomOrder()->first();
	return [
		'content' => $faker->name,
		'owner_id' => $user->id,
	];
});
