<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\LanguageController;
use App\Http\Requests\Admin\CreateClientRequestRequest;
use App\Http\Requests\Admin\UpdateClientRequestRequest;
use App\Repositories\Admin\ClientRequestRepository;
use App\Repositories\Admin\RequestCategoryRepository;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ClientRequestController extends AppBaseController
{
    /** @var  ClientRequestRepository */
    private $clientRequestRepository;

    /** @var  RequestCategoryRepository */
    private $requestCategoryRepository;

    public function __construct(ClientRequestRepository $clientRequestRepo,
        RequestCategoryRepository $requestCategoryRepo)
    {
        $this->clientRequestRepository = $clientRequestRepo;
        $this->requestCategoryRepository = $requestCategoryRepo;
    }

    /**
     * Display a listing of the ClientRequest.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->clientRequestRepository->pushCriteria(new RequestCriteria($request));
        $clientRequests = $this->clientRequestRepository->all();

        return view('admin.requests.client_requests.index')
            ->with('clientRequests', $clientRequests);
    }

    /**
     * Show the form for creating a new ClientRequest.
     *
     * @return Response
     */
    public function create()
    {
        $languages = LanguageController::getLanguageAll()->pluck('name', 'id');
        $requestCategory = array_column($this->requestCategoryRepository->getCustomized(), 'name', 'id');

        // dd('ss');
        // dd($requestCategory);
        return view('admin.requests.client_requests.create', compact(['languages', 'requestCategory']));
    }

    /**
     * Store a newly created ClientRequest in storage.
     *
     * @param CreateClientRequestRequest $request
     *
     * @return Response
     */
    public function store(CreateClientRequestRequest $request)
    {

        $input = $request->all();
        // $formatdate = $input['checkin_date'];
        $formatdate = Carbon::createFromFormat('Y-m-d H',$input['checkin_date'])->format('m/d/Y');
        dd($formatdate);

        $clientRequest = $this->clientRequestRepository->create($input);

        Flash::success('Client Request saved successfully.');

        return redirect(route('admin.clientRequests.index'));
    }

    /**
     * Display the specified ClientRequest.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientRequest = $this->clientRequestRepository->findWithoutFail($id);

        if (empty($clientRequest)) {
            Flash::error('Client Request not found');

            return redirect(route('admin.clientRequests.index'));
        }

        return view('admin.requests.client_requests.show')->with('clientRequest', $clientRequest);
    }

    /**
     * Show the form for editing the specified ClientRequest.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientRequest = $this->clientRequestRepository->findWithoutFail($id);

        if (empty($clientRequest)) {
            Flash::error('Client Request not found');

            return redirect(route('admin.clientRequests.index'));
        }

        return view('admin.requests.client_requests.edit')->with('clientRequest', $clientRequest);
    }

    /**
     * Update the specified ClientRequest in storage.
     *
     * @param  int              $id
     * @param UpdateClientRequestRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientRequestRequest $request)
    {
        $clientRequest = $this->clientRequestRepository->findWithoutFail($id);

        if (empty($clientRequest)) {
            Flash::error('Client Request not found');

            return redirect(route('admin.clientRequests.index'));
        }

        $clientRequest = $this->clientRequestRepository->update($request->all(), $id);

        Flash::success('Client Request updated successfully.');

        return redirect(route('admin.clientRequests.index'));
    }

    /**
     * Remove the specified ClientRequest from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientRequest = $this->clientRequestRepository->findWithoutFail($id);

        if (empty($clientRequest)) {
            Flash::error('Client Request not found');

            return redirect(route('admin.clientRequests.index'));
        }

        $this->clientRequestRepository->delete($id);

        Flash::success('Client Request deleted successfully.');

        return redirect(route('admin.clientRequests.index'));
    }
}
