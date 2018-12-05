<?php

use App\Models\Admin\RoomLocation;
use App\Models\Admin\RoomLocationTranslation;
use Illuminate\Database\Seeder;

class RoomLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room_locations = factory(RoomLocation::class, 2)->create();
        factory(RoomLocationTranslation::class)->create([
            'name' => 'Budoni',
            'language_id' => 1,
            'room_location_id' => $room_locations[0]->id,
        ]);

        factory(RoomLocationTranslation::class)->create([
            'name' => 'Loddui',
            'language_id' => 1,
            'room_location_id' => $room_locations[1]->id,
        ]);
    }
}
