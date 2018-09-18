<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateRoomSeasonRequest;
use App\Http\Requests\Admin\UpdateRoomSeasonRequest;
use App\Repositories\Admin\RoomSeasonRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RoomSeasonController extends AppBaseController
{
    /** @var  RoomSeasonRepository */
    private $roomSeasonRepository;

    public function __construct(RoomSeasonRepository $roomSeasonRepo)
    {
        $this->roomSeasonRepository = $roomSeasonRepo;
    }

    /**
     * Display a listing of the RoomSeason.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roomSeasonRepository->pushCriteria(new RequestCriteria($request));
        $roomSeasons = $this->roomSeasonRepository->all();

        return view('admin.rooms.room_seasons.index')
            ->with('roomSeasons', $roomSeasons);
    }

    /**
     * Show the form for creating a new RoomSeason.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.rooms.room_seasons.create');
    }

    /**
     * Store a newly created RoomSeason in storage.
     *
     * @param CreateRoomSeasonRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomSeasonRequest $request)
    {
        $input = $request->all();

        $roomSeason = $this->roomSeasonRepository->create($input);

        Flash::success('Room Season saved successfully.');

        return redirect(route('admin.roomSeasons.index'));
    }

    /**
     * Display the specified RoomSeason.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roomSeason = $this->roomSeasonRepository->findWithoutFail($id);

        if (empty($roomSeason)) {
            Flash::error('Room Season not found');

            return redirect(route('admin.roomSeasons.index'));
        }

        return view('admin.rooms.room_seasons.show')->with('roomSeason', $roomSeason);
    }

    /**
     * Show the form for editing the specified RoomSeason.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roomSeason = $this->roomSeasonRepository->findWithoutFail($id);

        if (empty($roomSeason)) {
            Flash::error('Room Season not found');

            return redirect(route('admin.roomSeasons.index'));
        }

        return view('admin.rooms.room_seasons.edit')->with('roomSeason', $roomSeason);
    }

    /**
     * Update the specified RoomSeason in storage.
     *
     * @param  int              $id
     * @param UpdateRoomSeasonRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomSeasonRequest $request)
    {
        $roomSeason = $this->roomSeasonRepository->findWithoutFail($id);

        if (empty($roomSeason)) {
            Flash::error('Room Season not found');

            return redirect(route('admin.roomSeasons.index'));
        }

        $roomSeason = $this->roomSeasonRepository->update($request->all(), $id);

        Flash::success('Room Season updated successfully.');

        return redirect(route('admin.roomSeasons.index'));
    }

    /**
     * Remove the specified RoomSeason from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roomSeason = $this->roomSeasonRepository->findWithoutFail($id);

        if (empty($roomSeason)) {
            Flash::error('Room Season not found');

            return redirect(route('admin.roomSeasons.index'));
        }

        $this->roomSeasonRepository->delete($id);

        Flash::success('Room Season deleted successfully.');

        return redirect(route('admin.roomSeasons.index'));
    }
}
