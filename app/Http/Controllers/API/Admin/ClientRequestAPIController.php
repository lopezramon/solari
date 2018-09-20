<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateClientRequestAPIRequest;
use App\Http\Requests\API\Admin\UpdateClientRequestAPIRequest;
use App\Models\Admin\ClientRequest;
use App\Repositories\Admin\ClientRequestRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ClientRequestController
 * @package App\Http\Controllers\API\Admin
 */

class ClientRequestAPIController extends AppBaseController
{
    /** @var  ClientRequestRepository */
    private $clientRequestRepository;

    public function __construct(ClientRequestRepository $clientRequestRepo)
    {
        $this->clientRequestRepository = $clientRequestRepo;
    }

    /**
     * Display a listing of the ClientRequest.
     * GET|HEAD /clientRequests
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->clientRequestRepository->pushCriteria(new RequestCriteria($request));
        $this->clientRequestRepository->pushCriteria(new LimitOffsetCriteria($request));
        $clientRequests = $this->clientRequestRepository->all();

        return $this->sendResponse($clientRequests->toArray(), 'Client Requests retrieved successfully');
    }

    /**
     * Store a newly created ClientRequest in storage.
     * POST /clientRequests
     *
     * @param CreateClientRequestAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClientRequestAPIRequest $request)
    {
        $input = $request->all();

        $clientRequests = $this->clientRequestRepository->create($input);

        return $this->sendResponse($clientRequests->toArray(), 'Client Request saved successfully');
    }

    /**
     * Display the specified ClientRequest.
     * GET|HEAD /clientRequests/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ClientRequest $clientRequest */
        $clientRequest = $this->clientRequestRepository->findWithoutFail($id);

        if (empty($clientRequest)) {
            return $this->sendError('Client Request not found');
        }

        return $this->sendResponse($clientRequest->toArray(), 'Client Request retrieved successfully');
    }

    /**
     * Update the specified ClientRequest in storage.
     * PUT/PATCH /clientRequests/{id}
     *
     * @param  int $id
     * @param UpdateClientRequestAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientRequestAPIRequest $request)
    {
        $input = $request->all();

        /** @var ClientRequest $clientRequest */
        $clientRequest = $this->clientRequestRepository->findWithoutFail($id);

        if (empty($clientRequest)) {
            return $this->sendError('Client Request not found');
        }

        $clientRequest = $this->clientRequestRepository->update($input, $id);

        return $this->sendResponse($clientRequest->toArray(), 'ClientRequest updated successfully');
    }

    /**
     * Remove the specified ClientRequest from storage.
     * DELETE /clientRequests/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ClientRequest $clientRequest */
        $clientRequest = $this->clientRequestRepository->findWithoutFail($id);

        if (empty($clientRequest)) {
            return $this->sendError('Client Request not found');
        }

        $clientRequest->delete();

        return $this->sendResponse($id, 'Client Request deleted successfully');
    }
}
