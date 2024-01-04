<?php

namespace App\Http\Controllers;

use App\Models\Utilization;
use App\Http\Requests\StoreUtilizationRequest;
use App\Http\Requests\UpdateUtilizationRequest;

class UtilizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilization = Utilization::paginate(10)->withPath(route('utilization.index'));
        return view('pages.utilization.index', compact('utilization'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.utilization.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUtilizationRequest $request)
    {
        Utilization::create($request->validated());

        return redirect()
            ->route('utilization.index')
            ->with([
                'message' => 'Utilization data added successfully!',
                'alert-type' => 'success',
                'color' => 'green',
                'icon' => '<i class="fa-solid fa-check-circle w-6 h-6"></i>',
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Utilization $utilization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Utilization $utilization)
    {
        return view('pages.utilization.edit', compact('utilization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUtilizationRequest $request, Utilization $utilization)
    {
        $utilization::where('id', $utilization->id)->update($request->validated());

        return redirect()
            ->route('utilization.index')
            ->with([
                'message' => 'Utilization data changed successfully!',
                'alert-type' => 'success',
                'color' => 'green',
                'icon' => '<i class="fa-solid fa-check-circle w-6 h-6"></i>',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Utilization $utilization)
    {
        $utilization::destroy($utilization->id);

        return redirect()
            ->route('utilization.index')
            ->with([
                'message' => 'Utilization data deleted successfully!',
                'alert-type' => 'success',
                'color' => 'green',
                'icon' => '<i class="fa-solid fa-check-circle w-6 h-6"></i>',
            ]);
    }
}