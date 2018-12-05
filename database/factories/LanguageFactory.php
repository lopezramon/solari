<?php

use App\Models\Admin\Language;
use App\Models\Admin\Status;
use Faker\Generator as Faker;

$factory->define(Language::class, function (Faker $faker) {
    return [
        'code' => $faker->text($maxNbChars = 5),
        'name' => $faker->word,
        'status_id' => 1,
    ];
});
