<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateSeoRequest;
use App\Http\Requests\Admin\UpdateSeoRequest;
use App\Repositories\Admin\SeoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SeoController extends AppBaseController
{
    /** @var  SeoRepository */
    private $seoRepository;

    public function __construct(SeoRepository $seoRepo)
    {
        $this->seoRepository = $seoRepo;
    }

    /**
     * Display a listing of the Seo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->seoRepository->pushCriteria(new RequestCriteria($request));
        $seos = $this->seoRepository->all();

        return view('admin.utils.seos.index')
            ->with('seos', $seos);
    }

    /**
     * Show the form for creating a new Seo.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.utils.seos.create');
    }

    /**
     * Store a newly created Seo in storage.
     *
     * @param CreateSeoRequest $request
     *
     * @return Response
     */
    public function store(CreateSeoRequest $request)
    {
        $input = $request->all();

        $seo = $this->seoRepository->create($input);

        Flash::success('Seo saved successfully.');

        return redirect(route('admin.seos.index'));
    }

    /**
     * Display the specified Seo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $seo = $this->seoRepository->findWithoutFail($id);

        if (empty($seo)) {
            Flash::error('Seo not found');

            return redirect(route('admin.seos.index'));
        }

        return view('admin.utils.seos.show')->with('seo', $seo);
    }

    /**
     * Show the form for editing the specified Seo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $seo = $this->seoRepository->findWithoutFail($id);

        if (empty($seo)) {
            Flash::error('Seo not found');

            return redirect(route('admin.seos.index'));
        }

        return view('admin.utils.seos.edit')->with('seo', $seo);
    }

    /**
     * Update the specified Seo in storage.
     *
     * @param  int              $id
     * @param UpdateSeoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeoRequest $request)
    {
        $seo = $this->seoRepository->findWithoutFail($id);

        if (empty($seo)) {
            Flash::error('Seo not found');

            return redirect(route('admin.seos.index'));
        }

        $seo = $this->seoRepository->update($request->all(), $id);

        Flash::success('Seo updated successfully.');

        return redirect(route('admin.seos.index'));
    }

    /**
     * Remove the specified Seo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $seo = $this->seoRepository->findWithoutFail($id);

        if (empty($seo)) {
            Flash::error('Seo not found');

            return redirect(route('admin.seos.index'));
        }

        $this->seoRepository->delete($id);

        Flash::success('Seo deleted successfully.');

        return redirect(route('admin.seos.index'));
    }
}
