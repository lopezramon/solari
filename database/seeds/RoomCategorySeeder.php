<?php

use App\Models\Admin\RoomCategory;
use App\Models\Admin\RoomCategoryTranslation;
use App\Models\Admin\RoomLocation;
use Illuminate\Database\Seeder;

class RoomCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room_categories = [];
        foreach (RoomLocation::all() as $room_location) {
            //dd($room_location);
            $room_categories[] = factory(RoomCategory::class, 5)->create([
                'room_location_id' => $room_location->id,
            ]);
        }

        foreach (RoomCategory::all() as $room_category) {
            factory(RoomCategoryTranslation::class, 5)->create([
                'room_category_id' => $room_category->id,
                'language_id' => 1,
                'name' => 'Italian-category' . $room_category->id,
            ]);
            factory(RoomCategoryTranslation::class, 5)->create([
                'room_category_id' => $room_category->id,
                'language_id' => 2,
                'name' => 'English-category' . $room_category->id,
            ]);
        }
    }
}
