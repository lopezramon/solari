<?php

use Faker\Factory as Faker;
use App\Models\Admin\RoomLocation;
use App\Repositories\Admin\RoomLocationRepository;

trait MakeRoomLocationTrait
{
    /**
     * Create fake instance of RoomLocation and save it in database
     *
     * @param array $roomLocationFields
     * @return RoomLocation
     */
    public function makeRoomLocation($roomLocationFields = [])
    {
        /** @var RoomLocationRepository $roomLocationRepo */
        $roomLocationRepo = App::make(RoomLocationRepository::class);
        $theme = $this->fakeRoomLocationData($roomLocationFields);
        return $roomLocationRepo->create($theme);
    }

    /**
     * Get fake instance of RoomLocation
     *
     * @param array $roomLocationFields
     * @return RoomLocation
     */
    public function fakeRoomLocation($roomLocationFields = [])
    {
        return new RoomLocation($this->fakeRoomLocationData($roomLocationFields));
    }

    /**
     * Get fake data of RoomLocation
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRoomLocationData($roomLocationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'code' => $fake->word,
            'status_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $roomLocationFields);
    }
}
