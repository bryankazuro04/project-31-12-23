<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service_times = Service::paginate(10)->withPath(route('service-time.index'));
        return view('pages.service-time.index', compact('service_times'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.service-time.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        Service::create($request->validated());

        return redirect()
            ->route('service-time.index')
            ->with([
                'message' => 'Service data added successfully!',
                'alert-type' => 'success',
                'color' => 'green',
                'icon' => '<i class="fa-solid fa-check-circle w-6 h-6"></i>',
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service_time)
    {
        return view('pages.service-time.edit', compact('service_time'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service_time)
    {
        $service_time::where('id', $service_time->id)->update($request->validated());

        return redirect()
            ->route('service-time.index')
            ->with([
                'message' => 'Service data changed successfully!',
                'alert-type' => 'success',
                'color' => 'green',
                'icon' => '<i class="fa-solid fa-check-circle w-6 h-6"></i>',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service_time)
    {
        $service_time::destroy($service_time->id);

        return redirect()
            ->route('service-time.index')
            ->with([
                'message' => 'Service data deleted successfully!',
                'alert-type' => 'success',
                'color' => 'green',
                'icon' => '<i class="fa-solid fa-check-circle w-6 h-6"></i>',
            ]);
    }
}