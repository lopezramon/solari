<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateDataFormAPIRequest;
use App\Http\Requests\API\Admin\UpdateDataFormAPIRequest;
use App\Models\Admin\DataForm;
use App\Repositories\Admin\DataFormRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DataFormController
 * @package App\Http\Controllers\API\Admin
 */

class DataFormAPIController extends AppBaseController
{
    /** @var  DataFormRepository */
    private $dataFormRepository;

    public function __construct(DataFormRepository $dataFormRepo)
    {
        $this->dataFormRepository = $dataFormRepo;
    }

    /**
     * Display a listing of the DataForm.
     * GET|HEAD /dataForms
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dataFormRepository->pushCriteria(new RequestCriteria($request));
        $this->dataFormRepository->pushCriteria(new LimitOffsetCriteria($request));
        $dataForms = $this->dataFormRepository->all();

        return $this->sendResponse($dataForms->toArray(), 'Form Datas retrieved successfully');
    }

    /**
     * Store a newly created DataForm in storage.
     * POST /dataForms
     *
     * @param CreateDataFormAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDataFormAPIRequest $request)
    {
        $input = $request->all();

        $dataForms = $this->dataFormRepository->create($input);

        return $this->sendResponse($dataForms->toArray(), 'Form Data saved successfully');
    }

    /**
     * Display the specified DataForm.
     * GET|HEAD /dataForms/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DataForm $dataForm */
        $dataForm = $this->dataFormRepository->findWithoutFail($id);

        if (empty($dataForm)) {
            return $this->sendError('Form Data not found');
        }

        return $this->sendResponse($dataForm->toArray(), 'Form Data retrieved successfully');
    }

    /**
     * Update the specified DataForm in storage.
     * PUT/PATCH /dataForms/{id}
     *
     * @param  int $id
     * @param UpdateDataFormAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataFormAPIRequest $request)
    {
        $input = $request->all();

        /** @var DataForm $dataForm */
        $dataForm = $this->dataFormRepository->findWithoutFail($id);

        if (empty($dataForm)) {
            return $this->sendError('Form Data not found');
        }

        $dataForm = $this->dataFormRepository->update($input, $id);

        return $this->sendResponse($dataForm->toArray(), 'DataForm updated successfully');
    }

    /**
     * Remove the specified DataForm from storage.
     * DELETE /dataForms/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DataForm $dataForm */
        $dataForm = $this->dataFormRepository->findWithoutFail($id);

        if (empty($dataForm)) {
            return $this->sendError('Form Data not found');
        }

        $dataForm->delete();

        return $this->sendResponse($id, 'Form Data deleted successfully');
    }
}
