<?php

namespace App\Http\Controllers\Api;

use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\GuideResource;
use App\Http\Resources\GuideCollection;
use App\Http\Requests\GuideStoreRequest;
use App\Http\Requests\GuideUpdateRequest;

class GuideController extends Controller
{
    public function index(Request $request): GuideCollection
    {
        $this->authorize('view-any', Guide::class);

        $search = $request->get('search', '');

        $guides = Guide::search($search)
            ->latest()
            ->paginate();

        return new GuideCollection($guides);
    }

    public function store(GuideStoreRequest $request): GuideResource
    {
        $this->authorize('create', Guide::class);

        $validated = $request->validated();

        $guide = Guide::create($validated);

        return new GuideResource($guide);
    }

    public function show(Request $request, Guide $guide): GuideResource
    {
        $this->authorize('view', $guide);

        return new GuideResource($guide);
    }

    public function update(
        GuideUpdateRequest $request,
        Guide $guide
    ): GuideResource {
        $this->authorize('update', $guide);

        $validated = $request->validated();

        $guide->update($validated);

        return new GuideResource($guide);
    }

    public function destroy(Request $request, Guide $guide): Response
    {
        $this->authorize('delete', $guide);

        $guide->delete();

        return response()->noContent();
    }
}
