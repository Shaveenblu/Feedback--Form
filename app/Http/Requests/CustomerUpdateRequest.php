<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
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
            'customer_name' => ['required', 'max:255', 'string'],
            'customer_phone_number' => ['required', 'max:255', 'string'],
            'tour_no' => ['required', 'max:255', 'string'],
        ];
    }
}
