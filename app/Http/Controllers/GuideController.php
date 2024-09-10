<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\GuideStoreRequest;
use App\Http\Requests\GuideUpdateRequest;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Guide::class);

        $search = $request->get('search', '');

        $guides = Guide::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.guides.index', compact('guides', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Guide::class);

        return view('app.guides.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuideStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Guide::class);

        $validated = $request->validated();

        $guide = Guide::create($validated);

        return redirect()
            ->route('guides.edit', $guide)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Guide $guide): View
    {
        $this->authorize('view', $guide);

        return view('app.guides.show', compact('guide'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Guide $guide): View
    {
        $this->authorize('update', $guide);

        return view('app.guides.edit', compact('guide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        GuideUpdateRequest $request,
        Guide $guide
    ): RedirectResponse {
        $this->authorize('update', $guide);

        $validated = $request->validated();

        $guide->update($validated);

        return redirect()
            ->route('guides.edit', $guide)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Guide $guide): RedirectResponse
    {
        $this->authorize('delete', $guide);

        $guide->delete();

        return redirect()
            ->route('guides.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
