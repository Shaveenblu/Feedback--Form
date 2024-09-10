<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TourStoreRequest;
use App\Http\Requests\TourUpdateRequest;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Tour::class);

        $search = $request->get('search', '');

        $tours = Tour::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.tours.index', compact('tours', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Tour::class);

        return view('app.tours.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TourStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Tour::class);

        $validated = $request->validated();

        $tour = Tour::create($validated);

        return redirect()
            ->route('tours.edit', $tour)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Tour $tour): View
    {
        $this->authorize('view', $tour);

        return view('app.tours.show', compact('tour'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Tour $tour): View
    {
        $this->authorize('update', $tour);

        return view('app.tours.edit', compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        TourUpdateRequest $request,
        Tour $tour
    ): RedirectResponse {
        $this->authorize('update', $tour);

        $validated = $request->validated();

        $tour->update($validated);

        return redirect()
            ->route('tours.edit', $tour)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Tour $tour): RedirectResponse
    {
        $this->authorize('delete', $tour);

        $tour->delete();

        return redirect()
            ->route('tours.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
