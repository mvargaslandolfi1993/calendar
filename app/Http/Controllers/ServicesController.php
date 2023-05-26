<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveServicesRequest;
use App\Http\Resources\ServicesResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display all services.
     * @return \App\Http\Resources\ServicesResource collection
     */
    public function index(Request $request)
    {
        return ServicesResource::collection(
            Service::paginate($request->get('limit', 25))->load('province')
        );
    }

    /**
     * Store a newly created resource.
     *
     * @param  \App\Http\Requests\SaveServicesRequest  $request
     * @return \App\Http\Resources\ServicesResource
     */
    public function store(SaveServicesRequest $request): ServicesResource
    {
        $service = Service::create($request->validated());

        return new ServicesResource($service->load('province'));
    }

    /**
     * Update the specified model.
     *
     * @param  \App\Http\Requests\SaveServicesRequest  $request
     * @param  \App\Models\Service  $service
     * @return \App\Http\Resources\ServicesResource
     */
    public function update(Service $service, SaveServicesRequest $request): ServicesResource
    {
        $service->update($request->validated());

        return new ServicesResource($service->load('province'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \App\Http\Resources\ServicesResource
     */
    public function show(Service $service)
    {
        return new ServicesResource($service->load('province'));
    }

    /**
     * Soft-Delete model.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return response([
            'message' => 'The service has been deleted'
        ], 200);
    }
}
