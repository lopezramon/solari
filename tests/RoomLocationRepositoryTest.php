<?php

use App\Models\Admin\RoomLocation;
use App\Repositories\Admin\RoomLocationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoomLocationRepositoryTest extends TestCase
{
    use MakeRoomLocationTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RoomLocationRepository
     */
    protected $roomLocationRepo;

    public function setUp()
    {
        parent::setUp();
        $this->roomLocationRepo = App::make(RoomLocationRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRoomLocation()
    {
        $roomLocation = $this->fakeRoomLocationData();
        $createdRoomLocation = $this->roomLocationRepo->create($roomLocation);
        $createdRoomLocation = $createdRoomLocation->toArray();
        $this->assertArrayHasKey('id', $createdRoomLocation);
        $this->assertNotNull($createdRoomLocation['id'], 'Created RoomLocation must have id specified');
        $this->assertNotNull(RoomLocation::find($createdRoomLocation['id']), 'RoomLocation with given id must be in DB');
        $this->assertModelData($roomLocation, $createdRoomLocation);
    }

    /**
     * @test read
     */
    public function testReadRoomLocation()
    {
        $roomLocation = $this->makeRoomLocation();
        $dbRoomLocation = $this->roomLocationRepo->find($roomLocation->id);
        $dbRoomLocation = $dbRoomLocation->toArray();
        $this->assertModelData($roomLocation->toArray(), $dbRoomLocation);
    }

    /**
     * @test update
     */
    public function testUpdateRoomLocation()
    {
        $roomLocation = $this->makeRoomLocation();
        $fakeRoomLocation = $this->fakeRoomLocationData();
        $updatedRoomLocation = $this->roomLocationRepo->update($fakeRoomLocation, $roomLocation->id);
        $this->assertModelData($fakeRoomLocation, $updatedRoomLocation->toArray());
        $dbRoomLocation = $this->roomLocationRepo->find($roomLocation->id);
        $this->assertModelData($fakeRoomLocation, $dbRoomLocation->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRoomLocation()
    {
        $roomLocation = $this->makeRoomLocation();
        $resp = $this->roomLocationRepo->delete($roomLocation->id);
        $this->assertTrue($resp);
        $this->assertNull(RoomLocation::find($roomLocation->id), 'RoomLocation should not exist in DB');
    }
}
