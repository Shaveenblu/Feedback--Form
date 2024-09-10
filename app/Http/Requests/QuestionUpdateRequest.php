<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class QuestionUpdateRequest extends FormRequest
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
            'question' => ['required', 'max:255', 'string'],
            'question_category_id' => [
                'required',
                'exists:question_categories,id',
            ],
            'unique_id' => [
                'required',
                Rule::unique('questions', 'unique_id')->ignore($this->question),
                'max:255',
                'string',
            ],
        ];
    }
}
