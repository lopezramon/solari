<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateLockedRoomRequest;
use App\Http\Requests\Admin\UpdateLockedRoomRequest;
use App\Repositories\Admin\LockedRoomRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LockedRoomController extends AppBaseController
{
    /** @var  LockedRoomRepository */
    private $lockedRoomRepository;

    public function __construct(LockedRoomRepository $lockedRoomRepo)
    {
        $this->lockedRoomRepository = $lockedRoomRepo;
    }

    /**
     * Display a listing of the LockedRoom.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->lockedRoomRepository->pushCriteria(new RequestCriteria($request));
        $lockedRooms = $this->lockedRoomRepository->all();

        return view('admin.locked_rooms.index')
            ->with('lockedRooms', $lockedRooms);
    }

    /**
     * Show the form for creating a new LockedRoom.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.locked_rooms.create');
    }

    /**
     * Store a newly created LockedRoom in storage.
     *
     * @param CreateLockedRoomRequest $request
     *
     * @return Response
     */
    public function store(CreateLockedRoomRequest $request)
    {
        $input = $request->all();

        $lockedRoom = $this->lockedRoomRepository->create($input);

        Flash::success('Locked Room saved successfully.');

        return redirect(route('admin.lockedRooms.index'));
    }

    /**
     * Display the specified LockedRoom.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lockedRoom = $this->lockedRoomRepository->findWithoutFail($id);

        if (empty($lockedRoom)) {
            Flash::error('Locked Room not found');

            return redirect(route('admin.lockedRooms.index'));
        }

        return view('admin.locked_rooms.show')->with('lockedRoom', $lockedRoom);
    }

    /**
     * Show the form for editing the specified LockedRoom.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lockedRoom = $this->lockedRoomRepository->findWithoutFail($id);

        if (empty($lockedRoom)) {
            Flash::error('Locked Room not found');

            return redirect(route('admin.lockedRooms.index'));
        }

        return view('admin.locked_rooms.edit')->with('lockedRoom', $lockedRoom);
    }

    /**
     * Update the specified LockedRoom in storage.
     *
     * @param  int              $id
     * @param UpdateLockedRoomRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLockedRoomRequest $request)
    {
        $lockedRoom = $this->lockedRoomRepository->findWithoutFail($id);

        if (empty($lockedRoom)) {
            Flash::error('Locked Room not found');

            return redirect(route('admin.lockedRooms.index'));
        }

        $lockedRoom = $this->lockedRoomRepository->update($request->all(), $id);

        Flash::success('Locked Room updated successfully.');

        return redirect(route('admin.lockedRooms.index'));
    }

    /**
     * Remove the specified LockedRoom from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lockedRoom = $this->lockedRoomRepository->findWithoutFail($id);

        if (empty($lockedRoom)) {
            Flash::error('Locked Room not found');

            return redirect(route('admin.lockedRooms.index'));
        }

        $this->lockedRoomRepository->delete($id);

        Flash::success('Locked Room deleted successfully.');

        return redirect(route('admin.lockedRooms.index'));
    }
}
