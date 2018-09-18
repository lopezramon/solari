<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateMultimediaRequest;
use App\Http\Requests\Admin\UpdateMultimediaRequest;
use App\Repositories\Admin\MultimediaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MultimediaController extends AppBaseController
{
    /** @var  MultimediaRepository */
    private $multimediaRepository;

    public function __construct(MultimediaRepository $multimediaRepo)
    {
        $this->multimediaRepository = $multimediaRepo;
    }

    /**
     * Display a listing of the Multimedia.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->multimediaRepository->pushCriteria(new RequestCriteria($request));
        $multimedia = $this->multimediaRepository->all();

        return view('admin.utils.multimedia.index')
            ->with('multimedia', $multimedia);
    }

    /**
     * Show the form for creating a new Multimedia.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.utils.multimedia.create');
    }

    /**
     * Store a newly created Multimedia in storage.
     *
     * @param CreateMultimediaRequest $request
     *
     * @return Response
     */
    public function store(CreateMultimediaRequest $request)
    {
        $input = $request->all();

        $multimedia = $this->multimediaRepository->create($input);

        Flash::success('Multimedia saved successfully.');

        return redirect(route('admin.multimedia.index'));
    }

    /**
     * Display the specified Multimedia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $multimedia = $this->multimediaRepository->findWithoutFail($id);

        if (empty($multimedia)) {
            Flash::error('Multimedia not found');

            return redirect(route('admin.multimedia.index'));
        }

        return view('admin.utils.multimedia.show')->with('multimedia', $multimedia);
    }

    /**
     * Show the form for editing the specified Multimedia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $multimedia = $this->multimediaRepository->findWithoutFail($id);

        if (empty($multimedia)) {
            Flash::error('Multimedia not found');

            return redirect(route('admin.multimedia.index'));
        }

        return view('admin.utils.multimedia.edit')->with('multimedia', $multimedia);
    }

    /**
     * Update the specified Multimedia in storage.
     *
     * @param  int              $id
     * @param UpdateMultimediaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMultimediaRequest $request)
    {
        $multimedia = $this->multimediaRepository->findWithoutFail($id);

        if (empty($multimedia)) {
            Flash::error('Multimedia not found');

            return redirect(route('admin.multimedia.index'));
        }

        $multimedia = $this->multimediaRepository->update($request->all(), $id);

        Flash::success('Multimedia updated successfully.');

        return redirect(route('admin.multimedia.index'));
    }

    /**
     * Remove the specified Multimedia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $multimedia = $this->multimediaRepository->findWithoutFail($id);

        if (empty($multimedia)) {
            Flash::error('Multimedia not found');

            return redirect(route('admin.multimedia.index'));
        }

        $this->multimediaRepository->delete($id);

        Flash::success('Multimedia deleted successfully.');

        return redirect(route('admin.multimedia.index'));
    }
}
