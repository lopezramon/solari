<?php

use App\Models\Admin\Status;
use Faker\Generator as Faker;

$factory->define(Status::class, function (Faker $faker) {
    return [
        'code' => $faker->text($maxNbChars = 5),
    ];
});
