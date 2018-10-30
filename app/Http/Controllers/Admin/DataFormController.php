<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateDataFormRequest;
use App\Http\Requests\Admin\UpdateDataFormRequest;
use App\Repositories\Admin\DataFormRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DataFormController extends AppBaseController
{
    /** @var  DataFormRepository */
    private $dataFormRepository;

    public function __construct(DataFormRepository $dataFormRepo)
    {
        $this->dataFormRepository = $dataFormRepo;
    }

    /**
     * Display a listing of the DataForm.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dataFormRepository->pushCriteria(new RequestCriteria($request));
        $dataForms = $this->dataFormRepository->all();

        return view('admin.form_datas.index')
            ->with('dataForms', $dataForms);
    }

    /**
     * Show the form for creating a new DataForm.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.form_datas.create');
    }

    /**
     * Store a newly created DataForm in storage.
     *
     * @param CreateDataFormRequest $request
     *
     * @return Response
     */
    public function store(CreateDataFormRequest $request)
    {
        $input = $request->all();

        $dataForm = $this->dataFormRepository->create($input);

        Flash::success('Form Data saved successfully.');

        return redirect(route('admin.dataForms.index'));
    }

    /**
     * Display the specified DataForm.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataForm = $this->dataFormRepository->findWithoutFail($id);

        if (empty($dataForm)) {
            Flash::error('Form Data not found');

            return redirect(route('admin.dataForms.index'));
        }

        return view('admin.form_datas.show')->with('dataForm', $dataForm);
    }

    /**
     * Show the form for editing the specified DataForm.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataForm = $this->dataFormRepository->findWithoutFail($id);

        if (empty($dataForm)) {
            Flash::error('Form Data not found');

            return redirect(route('admin.dataForms.index'));
        }

        return view('admin.form_datas.edit')->with('dataForm', $dataForm);
    }

    /**
     * Update the specified DataForm in storage.
     *
     * @param  int              $id
     * @param UpdateDataFormRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataFormRequest $request)
    {
        $dataForm = $this->dataFormRepository->findWithoutFail($id);

        if (empty($dataForm)) {
            Flash::error('Form Data not found');

            return redirect(route('admin.dataForms.index'));
        }

        $dataForm = $this->dataFormRepository->update($request->all(), $id);

        Flash::success('Form Data updated successfully.');

        return redirect(route('admin.dataForms.index'));
    }

    /**
     * Remove the specified DataForm from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataForm = $this->dataFormRepository->findWithoutFail($id);

        if (empty($dataForm)) {
            Flash::error('Form Data not found');

            return redirect(route('admin.dataForms.index'));
        }

        $this->dataFormRepository->delete($id);

        Flash::success('Form Data deleted successfully.');

        return redirect(route('admin.dataForms.index'));
    }
}
