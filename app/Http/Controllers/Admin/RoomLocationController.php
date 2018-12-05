<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\RoomLocationDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateRoomLocationRequest;
use App\Http\Requests\Admin\UpdateRoomLocationRequest;
use App\Repositories\Admin\RoomLocationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RoomLocationController extends AppBaseController
{
    /** @var  RoomLocationRepository */
    private $roomLocationRepository;

    public function __construct(RoomLocationRepository $roomLocationRepo)
    {
        $this->roomLocationRepository = $roomLocationRepo;
    }

    /**
     * Display a listing of the RoomLocation.
     *
     * @param RoomLocationDataTable $roomLocationDataTable
     * @return Response
     */
    public function index(RoomLocationDataTable $roomLocationDataTable)
    {
        return $roomLocationDataTable->render('admin.room_locations.index');
    }

    /**
     * Show the form for creating a new RoomLocation.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.room_locations.create');
    }

    /**
     * Store a newly created RoomLocation in storage.
     *
     * @param CreateRoomLocationRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomLocationRequest $request)
    {
        $input = $request->all();

        $roomLocation = $this->roomLocationRepository->create($input);

        Flash::success('Room Location saved successfully.');

        return redirect(route('admin.roomLocations.index'));
    }

    /**
     * Display the specified RoomLocation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roomLocation = $this->roomLocationRepository->findWithoutFail($id);

        if (empty($roomLocation)) {
            Flash::error('Room Location not found');

            return redirect(route('admin.roomLocations.index'));
        }

        return view('admin.room_locations.show')->with('roomLocation', $roomLocation);
    }

    /**
     * Show the form for editing the specified RoomLocation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roomLocation = $this->roomLocationRepository->findWithoutFail($id);

        if (empty($roomLocation)) {
            Flash::error('Room Location not found');

            return redirect(route('admin.roomLocations.index'));
        }

        return view('admin.room_locations.edit')->with('roomLocation', $roomLocation);
    }

    /**
     * Update the specified RoomLocation in storage.
     *
     * @param  int              $id
     * @param UpdateRoomLocationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomLocationRequest $request)
    {
        $roomLocation = $this->roomLocationRepository->findWithoutFail($id);

        if (empty($roomLocation)) {
            Flash::error('Room Location not found');

            return redirect(route('admin.roomLocations.index'));
        }

        $roomLocation = $this->roomLocationRepository->update($request->all(), $id);

        Flash::success('Room Location updated successfully.');

        return redirect(route('admin.roomLocations.index'));
    }

    /**
     * Remove the specified RoomLocation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roomLocation = $this->roomLocationRepository->findWithoutFail($id);

        if (empty($roomLocation)) {
            Flash::error('Room Location not found');

            return redirect(route('admin.roomLocations.index'));
        }

        $this->roomLocationRepository->delete($id);

        Flash::success('Room Location deleted successfully.');

        return redirect(route('admin.roomLocations.index'));
    }
}
