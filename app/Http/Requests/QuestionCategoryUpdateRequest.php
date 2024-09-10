<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class QuestionCategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255', 'string'],
            'unique_id' => [
                'required',
                Rule::unique('question_categories', 'unique_id')->ignore(
                    $this->questionCategory
                ),
                'max:255',
                'string',
            ],
        ];
    }
}
