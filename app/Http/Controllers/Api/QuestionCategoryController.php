<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\QuestionCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionCategoryResource;
use App\Http\Resources\QuestionCategoryCollection;
use App\Http\Requests\QuestionCategoryStoreRequest;
use App\Http\Requests\QuestionCategoryUpdateRequest;

class QuestionCategoryController extends Controller
{
    public function index(Request $request): QuestionCategoryCollection
    {
        $this->authorize('view-any', QuestionCategory::class);

        $search = $request->get('search', '');

        $questionCategories = QuestionCategory::search($search)
            ->latest()
            ->paginate();

        return new QuestionCategoryCollection($questionCategories);
    }

    public function store(
        QuestionCategoryStoreRequest $request
    ): QuestionCategoryResource {
        $this->authorize('create', QuestionCategory::class);

        $validated = $request->validated();

        $questionCategory = QuestionCategory::create($validated);

        return new QuestionCategoryResource($questionCategory);
    }

    public function show(
        Request $request,
        QuestionCategory $questionCategory
    ): QuestionCategoryResource {
        $this->authorize('view', $questionCategory);

        return new QuestionCategoryResource($questionCategory);
    }

    public function update(
        QuestionCategoryUpdateRequest $request,
        QuestionCategory $questionCategory
    ): QuestionCategoryResource {
        $this->authorize('update', $questionCategory);

        $validated = $request->validated();

        $questionCategory->update($validated);

        return new QuestionCategoryResource($questionCategory);
    }

    public function destroy(
        Request $request,
        QuestionCategory $questionCategory
    ): Response {
        $this->authorize('delete', $questionCategory);

        $questionCategory->delete();

        return response()->noContent();
    }
}
