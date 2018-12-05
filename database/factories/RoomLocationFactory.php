<?php

use App\Models\Admin\RoomLocation;
use App\Models\Admin\Status;
use Faker\Generator as Faker;

$factory->define(RoomLocation::class, function (Faker $faker) {
    return [
        'code' => $faker->text($maxNbChars = 5) ,
        'status_id' => 1,
    ];
});
