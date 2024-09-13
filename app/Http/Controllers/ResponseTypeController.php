<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\View\View;
use App\Models\ResponseType;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ResponseTypeStoreRequest;
use App\Http\Requests\ResponseTypeUpdateRequest;

class ResponseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', ResponseType::class);

        $search = $request->get('search', '');

        $responseTypes = ResponseType::search($search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'app.response_types.index',
            compact('responseTypes', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', ResponseType::class);

        return view('app.response_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResponseTypeStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', ResponseType::class);

        $validated = $request->validated();
        $validated['unique_id'] = Str::random(9);
        $responseType = ResponseType::create($validated);

        return redirect()
            ->route('response-types.edit', $responseType)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, ResponseType $responseType): View
    {
        $this->authorize('view', $responseType);

        return view('app.response_types.show', compact('responseType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, ResponseType $responseType): View
    {
        $this->authorize('update', $responseType);

        return view('app.response_types.edit', compact('responseType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ResponseTypeUpdateRequest $request,
        ResponseType $responseType
    ): RedirectResponse {
        $this->authorize('update', $responseType);

        $validated = $request->validated();
        $responseType->update($validated);

        return redirect()
            ->route('response-types.edit', $responseType)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        ResponseType $responseType
    ): RedirectResponse {
        $this->authorize('delete', $responseType);

        $responseType->delete();

        return redirect()
            ->route('response-types.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
