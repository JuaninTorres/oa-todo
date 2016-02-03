<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Project::class, function (Faker\Generator $faker) {
    $users = \App\User::all()->pluck('name', 'id')->toArray();
    return [
        'name' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'user_id' => $faker->randomElement(array_keys($users))
    ];
});

$factory->define(App\Task::class, function (Faker\Generator $faker) {
    $users = \App\User::all()->pluck('name', 'id')->toArray();
    $projects = \App\Project::all()->pluck('name', 'id')->toArray();

    return [
        'name' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'project_id' => $faker->randomElement(array_keys($projects)),
        'responsible_id' => $faker->randomElement(array_keys($users)),
        'finished' => $faker->boolean(30),
    ];
});