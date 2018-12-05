<?php

use App\Models\Admin\Language;
use App\Models\Admin\RoomLocation;
use App\Models\Admin\RoomLocationTranslation;
use Faker\Generator as Faker;

$factory->define(RoomLocationTranslation::class, function (Faker $faker) {
    return [
        'room_location_id' => function(){
            return factory(RoomLocation::class)->create();
        },
        'language_id' => function(){
            return factory(Language::class)->create();
        },
        'name' => $faker->word,
        'description' => $faker->word,
    ];
});
