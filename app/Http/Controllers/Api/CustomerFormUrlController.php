<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\CustomerFormUrl;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerFormUrlResource;
use App\Http\Resources\CustomerFormUrlCollection;
use App\Http\Requests\CustomerFormUrlStoreRequest;
use App\Http\Requests\CustomerFormUrlUpdateRequest;

class CustomerFormUrlController extends Controller
{
    public function index(Request $request): CustomerFormUrlCollection
    {
        $this->authorize('view-any', CustomerFormUrl::class);

        $search = $request->get('search', '');

        $customerFormUrls = CustomerFormUrl::search($search)
            ->latest()
            ->paginate();

        return new CustomerFormUrlCollection($customerFormUrls);
    }

    public function store(
        CustomerFormUrlStoreRequest $request
    ): CustomerFormUrlResource {
        $this->authorize('create', CustomerFormUrl::class);

        $validated = $request->validated();

        $customerFormUrl = CustomerFormUrl::create($validated);

        return new CustomerFormUrlResource($customerFormUrl);
    }

    public function show(
        Request $request,
        CustomerFormUrl $customerFormUrl
    ): CustomerFormUrlResource {
        $this->authorize('view', $customerFormUrl);

        return new CustomerFormUrlResource($customerFormUrl);
    }

    public function update(
        CustomerFormUrlUpdateRequest $request,
        CustomerFormUrl $customerFormUrl
    ): CustomerFormUrlResource {
        $this->authorize('update', $customerFormUrl);

        $validated = $request->validated();

        $customerFormUrl->update($validated);

        return new CustomerFormUrlResource($customerFormUrl);
    }

    public function destroy(
        Request $request,
        CustomerFormUrl $customerFormUrl
    ): Response {
        $this->authorize('delete', $customerFormUrl);

        $customerFormUrl->delete();

        return response()->noContent();
    }
}
