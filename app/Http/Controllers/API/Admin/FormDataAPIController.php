<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateFormDataAPIRequest;
use App\Http\Requests\API\Admin\UpdateFormDataAPIRequest;
use App\Models\Admin\FormData;
use App\Repositories\Admin\FormDataRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class FormDataController
 * @package App\Http\Controllers\API\Admin
 */

class FormDataAPIController extends AppBaseController
{
    /** @var  FormDataRepository */
    private $formDataRepository;

    public function __construct(FormDataRepository $formDataRepo)
    {
        $this->formDataRepository = $formDataRepo;
    }

    /**
     * Display a listing of the FormData.
     * GET|HEAD /formDatas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->formDataRepository->pushCriteria(new RequestCriteria($request));
        $this->formDataRepository->pushCriteria(new LimitOffsetCriteria($request));
        $formDatas = $this->formDataRepository->all();

        return $this->sendResponse($formDatas->toArray(), 'Form Datas retrieved successfully');
    }

    /**
     * Store a newly created FormData in storage.
     * POST /formDatas
     *
     * @param CreateFormDataAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFormDataAPIRequest $request)
    {
        $input = $request->all();

        $formDatas = $this->formDataRepository->create($input);

        return $this->sendResponse($formDatas->toArray(), 'Form Data saved successfully');
    }

    /**
     * Display the specified FormData.
     * GET|HEAD /formDatas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FormData $formData */
        $formData = $this->formDataRepository->findWithoutFail($id);

        if (empty($formData)) {
            return $this->sendError('Form Data not found');
        }

        return $this->sendResponse($formData->toArray(), 'Form Data retrieved successfully');
    }

    /**
     * Update the specified FormData in storage.
     * PUT/PATCH /formDatas/{id}
     *
     * @param  int $id
     * @param UpdateFormDataAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormDataAPIRequest $request)
    {
        $input = $request->all();

        /** @var FormData $formData */
        $formData = $this->formDataRepository->findWithoutFail($id);

        if (empty($formData)) {
            return $this->sendError('Form Data not found');
        }

        $formData = $this->formDataRepository->update($input, $id);

        return $this->sendResponse($formData->toArray(), 'FormData updated successfully');
    }

    /**
     * Remove the specified FormData from storage.
     * DELETE /formDatas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FormData $formData */
        $formData = $this->formDataRepository->findWithoutFail($id);

        if (empty($formData)) {
            return $this->sendError('Form Data not found');
        }

        $formData->delete();

        return $this->sendResponse($id, 'Form Data deleted successfully');
    }
}
