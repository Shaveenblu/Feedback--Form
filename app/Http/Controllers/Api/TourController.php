<?php

namespace App\Http\Controllers\Api;

use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\TourResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\TourCollection;
use App\Http\Requests\TourStoreRequest;
use App\Http\Requests\TourUpdateRequest;

class TourController extends Controller
{
    public function index(Request $request): TourCollection
    {
        $this->authorize('view-any', Tour::class);

        $search = $request->get('search', '');

        $tours = Tour::search($search)
            ->latest()
            ->paginate();

        return new TourCollection($tours);
    }

    public function store(TourStoreRequest $request): TourResource
    {
        $this->authorize('create', Tour::class);

        $validated = $request->validated();

        $tour = Tour::create($validated);

        return new TourResource($tour);
    }

    public function show(Request $request, Tour $tour): TourResource
    {
        $this->authorize('view', $tour);

        return new TourResource($tour);
    }

    public function update(TourUpdateRequest $request, Tour $tour): TourResource
    {
        $this->authorize('update', $tour);

        $validated = $request->validated();

        $tour->update($validated);

        return new TourResource($tour);
    }

    public function destroy(Request $request, Tour $tour): Response
    {
        $this->authorize('delete', $tour);

        $tour->delete();

        return response()->noContent();
    }
}
