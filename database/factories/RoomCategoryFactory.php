<?php

use App\Models\Admin\RoomCategory;
use App\Models\Admin\Status;
use Faker\Generator as Faker;

$factory->define(RoomCategory::class, function (Faker $faker) {
    return [
        'code' => $faker->text($maxNbChars = 5),
        'status_id' => 1,
    ];
});
