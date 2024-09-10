<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class QuestionStoreRequest extends FormRequest
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
                'unique:questions,unique_id',
                'max:255',
                'string',
            ],
        ];
    }
}
