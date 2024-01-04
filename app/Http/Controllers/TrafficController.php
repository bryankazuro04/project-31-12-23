<?php

namespace App\Http\Controllers;

use App\Models\Traffic;
use App\Http\Requests\StoreTrafficRequest;
use App\Http\Requests\UpdateTrafficRequest;

class TrafficController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $traffics = Traffic::paginate(10)->withPath(route('traffic.index'));
        return view('pages.traffic.index', compact('traffics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.traffic.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrafficRequest $request)
    {
        Traffic::create($request->validated());
        
        return redirect()
            ->route('traffic.index')
            ->with([
                'message' => 'Traffic data added successfully!',
                'alert-type' => 'success',
                'color' => 'green',
                'icon' => '<i class="fa-solid fa-check-circle w-6 h-6"></i>',
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Traffic $traffic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Traffic $traffic)
    {
        return view("pages.traffic.edit", compact('traffic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrafficRequest $request, Traffic $traffic)
    {
        $traffic::where('id', $traffic->id)->update($request->validated());

        return redirect()
            ->route('traffic.index')
            ->with([
                'message' => 'Traffic data changed successfully!',
                'alert-type' => 'success',
                'color' => 'green',
                'icon' => '<i class="fa-solid fa-check-circle w-6 h-6"></i>',
            ]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Traffic $traffic)
    {
        $traffic::destroy($traffic->id);

        return redirect()
            ->route('traffic.index')
            ->with([
                'message' => 'Traffic data deleted successfully!',
                'alert-type' => 'success',
                'color' => 'green',
                'icon' => '<i class="fa-solid fa-check-circle w-6 h-6"></i>',
            ]);
    }
}