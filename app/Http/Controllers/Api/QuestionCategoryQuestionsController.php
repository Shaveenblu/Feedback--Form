<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\QuestionCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\QuestionCollection;

class QuestionCategoryQuestionsController extends Controller
{
    public function index(
        Request $request,
        QuestionCategory $questionCategory
    ): QuestionCollection {
        $this->authorize('view', $questionCategory);

        $search = $request->get('search', '');

        $questions = $questionCategory
            ->questions()
            ->search($search)
            ->latest()
            ->paginate();

        return new QuestionCollection($questions);
    }

    public function store(
        Request $request,
        QuestionCategory $questionCategory
    ): QuestionResource {
        $this->authorize('create', Question::class);

        $validated = $request->validate([
            'question' => ['required', 'max:255', 'string'],
            'unique_id' => [
                'required',
                'unique:questions,unique_id',
                'max:255',
                'string',
            ],
        ]);

        $question = $questionCategory->questions()->create($validated);

        return new QuestionResource($question);
    }
}
