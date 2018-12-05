<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoomLocationApiTest extends TestCase
{
    use MakeRoomLocationTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRoomLocation()
    {
        $roomLocation = $this->fakeRoomLocationData();
        $this->json('POST', '/api/v1/roomLocations', $roomLocation);

        $this->assertApiResponse($roomLocation);
    }

    /**
     * @test
     */
    public function testReadRoomLocation()
    {
        $roomLocation = $this->makeRoomLocation();
        $this->json('GET', '/api/v1/roomLocations/'.$roomLocation->id);

        $this->assertApiResponse($roomLocation->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRoomLocation()
    {
        $roomLocation = $this->makeRoomLocation();
        $editedRoomLocation = $this->fakeRoomLocationData();

        $this->json('PUT', '/api/v1/roomLocations/'.$roomLocation->id, $editedRoomLocation);

        $this->assertApiResponse($editedRoomLocation);
    }

    /**
     * @test
     */
    public function testDeleteRoomLocation()
    {
        $roomLocation = $this->makeRoomLocation();
        $this->json('DELETE', '/api/v1/roomLocations/'.$roomLocation->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/roomLocations/'.$roomLocation->id);

        $this->assertResponseStatus(404);
    }
}
