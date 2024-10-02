<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class GuideUpdateRequest extends FormRequest
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
            'unique_id' => [
                'required',
                Rule::unique('guides', 'unique_id')->ignore($this->guide),
                'max:255',
                'string',
            ],
            'guid_first_name' => ['required', 'max:255', 'string'],
            'guid_last_name' => ['required', 'max:255', 'string'],
        ];
    }
}
