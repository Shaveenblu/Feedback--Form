<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\QuestionCategory;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\QuestionCategoryStoreRequest;
use App\Http\Requests\QuestionCategoryUpdateRequest;

class QuestionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', QuestionCategory::class);

        $search = $request->get('search', '');

        $questionCategories = QuestionCategory::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.question_categories.index',
            compact('questionCategories', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', QuestionCategory::class);

        return view('app.question_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        QuestionCategoryStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', QuestionCategory::class);

        $validated = $request->validated();

        $questionCategory = QuestionCategory::create($validated);

        return redirect()
            ->route('question-categories.edit', $questionCategory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        QuestionCategory $questionCategory
    ): View {
        $this->authorize('view', $questionCategory);

        return view(
            'app.question_categories.show',
            compact('questionCategory')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        QuestionCategory $questionCategory
    ): View {
        $this->authorize('update', $questionCategory);

        return view(
            'app.question_categories.edit',
            compact('questionCategory')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        QuestionCategoryUpdateRequest $request,
        QuestionCategory $questionCategory
    ): RedirectResponse {
        $this->authorize('update', $questionCategory);

        $validated = $request->validated();

        $questionCategory->update($validated);

        return redirect()
            ->route('question-categories.edit', $questionCategory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        QuestionCategory $questionCategory
    ): RedirectResponse {
        $this->authorize('delete', $questionCategory);

        $questionCategory->delete();

        return redirect()
            ->route('question-categories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
