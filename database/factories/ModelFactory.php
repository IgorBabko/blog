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

// $factory->define(Blog\User::class, function (Faker\Generator $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->email,
//         'password' => bcrypt(str_random(10)),
//         'remember_token' => str_random(10),
//     ];
// });

$catId = 0;
$cat = ['meteor', 'node', 'jquery'];

$factory->define(Blog\Category::class, function ($faker) use ($cat, $catId) {
    return [
        'name' => $cat[$catId++],
    ];
});

$factory->define(Blog\Post::class, function ($faker) {
    echo 'bellic';

    return [
        'title' => $faker->sentence(mt_rand(3, 10)),
        'thumbnail' => '/assets/img/avatar.png',
        'category_id' => mt_rand(1, 3),
        'thumbnail' => '/assets/img/avatar.png',
        'content' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
        'published_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
    ];
});

$factory->define(Blog\Comment::class, function ($faker) {
    return [
        'post_id' => mt_rand(1, 10),
        'content' => join("\n\n", $faker->paragraphs(mt_rand(1, 2))),
        'published_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
    ];
});

$factory->define(Blog\Question::class, function ($faker) {
    return [
        'title' => $faker->sentence(mt_rand(3, 10)),
        'content' => join("\n\n", $faker->paragraphs(mt_rand(1, 3))),
        'published_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
    ];
});

$factory->define(Blog\Answer::class, function ($faker) {
    return [
        'question_id' => mt_rand(1, 10),
        'content' => join("\n\n", $faker->paragraphs(mt_rand(1, 3))),
        'published_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
    ];
});
