<?php

use App\Models\Admin\Language;
use App\Models\Admin\RoomCategory;
use App\Models\Admin\RoomCategoryTranslation;
use Faker\Generator as Faker;

$factory->define(RoomCategoryTranslation::class, function (Faker $faker) {
    return [
        'room_category_id' => function(){
            return factory(RoomCategory::class)->create();
        },
        'language_id' => function(){
            return factory(Language::class)->create();
        },
        'name' => $faker->word,
        'description' =>$faker->word,
    ];
});
