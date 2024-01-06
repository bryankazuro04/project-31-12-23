<?php

namespace App\Http\Controllers;

use App\Models\Productivity;
use App\Http\Requests\StoreProductivityRequest;
use App\Http\Requests\UpdateProductivityRequest;
use App\Models\Operation;

class ProductivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productivities = Productivity::paginate(10)->withPath(route('productivity.index'));
        return view('pages.productivity.index', compact('productivities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.productivity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductivityRequest $request)
    {
        $productivity = Productivity::create($request->validated());
        $operation = new Operation(['productivities_id' => $productivity->id]);
        $productivity->operations()->save($operation);

        return redirect()
            ->route('productivity.index')
            ->with([
                'message' => 'Productivity data added successfully!',
                'alert-type' => 'success',
                'color' => 'green',
                'icon' => '<i class="fa-solid fa-check-circle w-6 h-6"></i>',
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Productivity $productivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Productivity $productivity)
    {
        return view('pages.productivity.edit', compact('productivity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductivityRequest $request, Productivity $productivity)
    {
        $productivity::where('id', $productivity->id)->update($request->validated());

        return redirect()
            ->route('productivity.index')
            ->with([
                'message' => 'Productivity data changed successfully!',
                'alert-type' => 'success',
                'color' => 'green',
                'icon' => '<i class="fa-solid fa-check-circle w-6 h-6"></i>',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Productivity $productivity)
    {
        $productivity::destroy($productivity->id);

        return redirect()
            ->route('productivity.index')
            ->with([
                'message' => 'Productivity data deleted successfully!',
                'alert-type' => 'success',
                'color' => 'green',
                'icon' => '<i class="fa-solid fa-check-circle w-6 h-6"></i>',
            ]);
    }
}