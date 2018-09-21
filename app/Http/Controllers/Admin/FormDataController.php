<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateFormDataRequest;
use App\Http\Requests\Admin\UpdateFormDataRequest;
use App\Repositories\Admin\FormDataRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FormDataController extends AppBaseController
{
    /** @var  FormDataRepository */
    private $formDataRepository;

    public function __construct(FormDataRepository $formDataRepo)
    {
        $this->formDataRepository = $formDataRepo;
    }

    /**
     * Display a listing of the FormData.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->formDataRepository->pushCriteria(new RequestCriteria($request));
        $formDatas = $this->formDataRepository->all();

        return view('admin.form_datas.index')
            ->with('formDatas', $formDatas);
    }

    /**
     * Show the form for creating a new FormData.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.form_datas.create');
    }

    /**
     * Store a newly created FormData in storage.
     *
     * @param CreateFormDataRequest $request
     *
     * @return Response
     */
    public function store(CreateFormDataRequest $request)
    {
        $input = $request->all();

        $formData = $this->formDataRepository->create($input);

        Flash::success('Form Data saved successfully.');

        return redirect(route('admin.formDatas.index'));
    }

    /**
     * Display the specified FormData.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $formData = $this->formDataRepository->findWithoutFail($id);

        if (empty($formData)) {
            Flash::error('Form Data not found');

            return redirect(route('admin.formDatas.index'));
        }

        return view('admin.form_datas.show')->with('formData', $formData);
    }

    /**
     * Show the form for editing the specified FormData.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $formData = $this->formDataRepository->findWithoutFail($id);

        if (empty($formData)) {
            Flash::error('Form Data not found');

            return redirect(route('admin.formDatas.index'));
        }

        return view('admin.form_datas.edit')->with('formData', $formData);
    }

    /**
     * Update the specified FormData in storage.
     *
     * @param  int              $id
     * @param UpdateFormDataRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormDataRequest $request)
    {
        $formData = $this->formDataRepository->findWithoutFail($id);

        if (empty($formData)) {
            Flash::error('Form Data not found');

            return redirect(route('admin.formDatas.index'));
        }

        $formData = $this->formDataRepository->update($request->all(), $id);

        Flash::success('Form Data updated successfully.');

        return redirect(route('admin.formDatas.index'));
    }

    /**
     * Remove the specified FormData from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $formData = $this->formDataRepository->findWithoutFail($id);

        if (empty($formData)) {
            Flash::error('Form Data not found');

            return redirect(route('admin.formDatas.index'));
        }

        $this->formDataRepository->delete($id);

        Flash::success('Form Data deleted successfully.');

        return redirect(route('admin.formDatas.index'));
    }
}
