<?php

namespace App\Http\Controllers;

use App\Traits\HandleResponse;
use App\Services\CloseContactService;
use App\Http\Requests\StoreCloseContactRequest;
use App\Http\Resources\CloseContact as CloseContactResources;

/**
 * @group CloseContact
 *
 *
 */
class CloseContactController extends Controller
{
    use HandleResponse;
    public function __construct(
        CloseContactService $close_contact_service
    ) {
        $this->close_contact_service = $close_contact_service;
    }

    /**
     * Display a listing of the resource based on seleceted city.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CloseContacts = $this->close_contact_service->getAll();

        return $this->successResourceResponse(
            CloseContactResources::collection($CloseContacts),
            "Success",
            202
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param  App\Http\Requests\StoreCloseContactRequest $request
     *
     * @return \App\Traits\HandleResponse
     */
    public function create(StoreCloseContactRequest $request)
    {
        $contact_tracer = $this->close_contact_service->store($request->all());

        if (!$contact_tracer) {
            return $this->errorResponse(
                config('responses.create_failed.message'),
                config('responses.create_failed.code')
            );
        }
        if ($contact_tracer === true) {
            return $this->successResponse(
                true,
                config('responses.create_success.message'),
                config('responses.create_success.code')
            );
        }

        return $this->errorResponse(
            $contact_tracer,
            config('responses.update_failed.code')
        );
    }
}