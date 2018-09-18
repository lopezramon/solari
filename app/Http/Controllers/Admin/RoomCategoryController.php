<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateRoomCategoryRequest;
use App\Http\Requests\Admin\UpdateRoomCategoryRequest;
use App\Repositories\Admin\RoomCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RoomCategoryController extends AppBaseController
{
    /** @var  RoomCategoryRepository */
    private $roomCategoryRepository;

    public function __construct(RoomCategoryRepository $roomCategoryRepo)
    {
        $this->roomCategoryRepository = $roomCategoryRepo;
    }

    /**
     * Display a listing of the RoomCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roomCategoryRepository->pushCriteria(new RequestCriteria($request));
        $roomCategories = $this->roomCategoryRepository->all();

        return view('admin.rooms.room_categories.index')
            ->with('roomCategories', $roomCategories);
    }

    /**
     * Show the form for creating a new RoomCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.rooms.room_categories.create');
    }

    /**
     * Store a newly created RoomCategory in storage.
     *
     * @param CreateRoomCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomCategoryRequest $request)
    {
        $input = $request->all();

        $roomCategory = $this->roomCategoryRepository->create($input);

        Flash::success('Room Category saved successfully.');

        return redirect(route('admin.roomCategories.index'));
    }

    /**
     * Display the specified RoomCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roomCategory = $this->roomCategoryRepository->findWithoutFail($id);

        if (empty($roomCategory)) {
            Flash::error('Room Category not found');

            return redirect(route('admin.roomCategories.index'));
        }

        return view('admin.rooms.room_categories.show')->with('roomCategory', $roomCategory);
    }

    /**
     * Show the form for editing the specified RoomCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roomCategory = $this->roomCategoryRepository->findWithoutFail($id);

        if (empty($roomCategory)) {
            Flash::error('Room Category not found');

            return redirect(route('admin.roomCategories.index'));
        }

        return view('admin.rooms.room_categories.edit')->with('roomCategory', $roomCategory);
    }

    /**
     * Update the specified RoomCategory in storage.
     *
     * @param  int              $id
     * @param UpdateRoomCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomCategoryRequest $request)
    {
        $roomCategory = $this->roomCategoryRepository->findWithoutFail($id);

        if (empty($roomCategory)) {
            Flash::error('Room Category not found');

            return redirect(route('admin.roomCategories.index'));
        }

        $roomCategory = $this->roomCategoryRepository->update($request->all(), $id);

        Flash::success('Room Category updated successfully.');

        return redirect(route('admin.roomCategories.index'));
    }

    /**
     * Remove the specified RoomCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roomCategory = $this->roomCategoryRepository->findWithoutFail($id);

        if (empty($roomCategory)) {
            Flash::error('Room Category not found');

            return redirect(route('admin.roomCategories.index'));
        }

        $this->roomCategoryRepository->delete($id);

        Flash::success('Room Category deleted successfully.');

        return redirect(route('admin.roomCategories.index'));
    }
}
