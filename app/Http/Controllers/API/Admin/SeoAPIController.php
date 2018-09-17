<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateSeoAPIRequest;
use App\Http\Requests\API\Admin\UpdateSeoAPIRequest;
use App\Models\Admin\Seo;
use App\Repositories\Admin\SeoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SeoController
 * @package App\Http\Controllers\API\Admin
 */

class SeoAPIController extends AppBaseController
{
    /** @var  SeoRepository */
    private $seoRepository;

    public function __construct(SeoRepository $seoRepo)
    {
        $this->seoRepository = $seoRepo;
    }

    /**
     * Display a listing of the Seo.
     * GET|HEAD /seos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->seoRepository->pushCriteria(new RequestCriteria($request));
        $this->seoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $seos = $this->seoRepository->all();

        return $this->sendResponse($seos->toArray(), 'Seos retrieved successfully');
    }

    /**
     * Store a newly created Seo in storage.
     * POST /seos
     *
     * @param CreateSeoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSeoAPIRequest $request)
    {
        $input = $request->all();

        $seos = $this->seoRepository->create($input);

        return $this->sendResponse($seos->toArray(), 'Seo saved successfully');
    }

    /**
     * Display the specified Seo.
     * GET|HEAD /seos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Seo $seo */
        $seo = $this->seoRepository->findWithoutFail($id);

        if (empty($seo)) {
            return $this->sendError('Seo not found');
        }

        return $this->sendResponse($seo->toArray(), 'Seo retrieved successfully');
    }

    /**
     * Update the specified Seo in storage.
     * PUT/PATCH /seos/{id}
     *
     * @param  int $id
     * @param UpdateSeoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Seo $seo */
        $seo = $this->seoRepository->findWithoutFail($id);

        if (empty($seo)) {
            return $this->sendError('Seo not found');
        }

        $seo = $this->seoRepository->update($input, $id);

        return $this->sendResponse($seo->toArray(), 'Seo updated successfully');
    }

    /**
     * Remove the specified Seo from storage.
     * DELETE /seos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Seo $seo */
        $seo = $this->seoRepository->findWithoutFail($id);

        if (empty($seo)) {
            return $this->sendError('Seo not found');
        }

        $seo->delete();

        return $this->sendResponse($id, 'Seo deleted successfully');
    }
}
