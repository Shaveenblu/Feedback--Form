<?php

namespace App\Http\Controllers\Api;

use App\Models\ResponseType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseTypeResource;
use App\Http\Resources\ResponseTypeCollection;
use App\Http\Requests\ResponseTypeStoreRequest;
use App\Http\Requests\ResponseTypeUpdateRequest;

class ResponseTypeController extends Controller
{
    public function index(Request $request): ResponseTypeCollection
    {
        $this->authorize('view-any', ResponseType::class);

        $search = $request->get('search', '');

        $responseTypes = ResponseType::search($search)
            ->latest()
            ->paginate();

        return new ResponseTypeCollection($responseTypes);
    }

    public function store(
        ResponseTypeStoreRequest $request
    ): ResponseTypeResource {
        $this->authorize('create', ResponseType::class);

        $validated = $request->validated();

        $responseType = ResponseType::create($validated);

        return new ResponseTypeResource($responseType);
    }

    public function show(
        Request $request,
        ResponseType $responseType
    ): ResponseTypeResource {
        $this->authorize('view', $responseType);

        return new ResponseTypeResource($responseType);
    }

    public function update(
        ResponseTypeUpdateRequest $request,
        ResponseType $responseType
    ): ResponseTypeResource {
        $this->authorize('update', $responseType);

        $validated = $request->validated();

        $responseType->update($validated);

        return new ResponseTypeResource($responseType);
    }

    public function destroy(
        Request $request,
        ResponseType $responseType
    ): Response {
        $this->authorize('delete', $responseType);

        $responseType->delete();

        return response()->noContent();
    }
}
