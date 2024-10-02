<?php

namespace App\Http\Controllers\Api;

use App\Models\FeedBackForm;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\FeedBackFormResource;
use App\Http\Resources\FeedBackFormCollection;
use App\Http\Requests\FeedBackFormStoreRequest;
use App\Http\Requests\FeedBackFormUpdateRequest;

class FeedBackFormController extends Controller
{
    public function index(Request $request): FeedBackFormCollection
    {
        $this->authorize('view-any', FeedBackForm::class);

        $search = $request->get('search', '');

        $feedBackForms = FeedBackForm::search($search)
            ->latest()
            ->paginate();

        return new FeedBackFormCollection($feedBackForms);
    }

    public function store(
        FeedBackFormStoreRequest $request
    ): FeedBackFormResource {
        $this->authorize('create', FeedBackForm::class);

        $validated = $request->validated();

        $feedBackForm = FeedBackForm::create($validated);

        return new FeedBackFormResource($feedBackForm);
    }

    public function show(
        Request $request,
        FeedBackForm $feedBackForm
    ): FeedBackFormResource {
        $this->authorize('view', $feedBackForm);

        return new FeedBackFormResource($feedBackForm);
    }

    public function update(
        FeedBackFormUpdateRequest $request,
        FeedBackForm $feedBackForm
    ): FeedBackFormResource {
        $this->authorize('update', $feedBackForm);

        $validated = $request->validated();

        $feedBackForm->update($validated);

        return new FeedBackFormResource($feedBackForm);
    }

    public function destroy(
        Request $request,
        FeedBackForm $feedBackForm
    ): Response {
        $this->authorize('delete', $feedBackForm);

        $feedBackForm->delete();

        return response()->noContent();
    }
}
