<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedBackFormStoreRequest extends FormRequest
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
            'question_id' => ['required', 'exists:questions,id'],
            'customer_id' => ['required', 'exists:customers,id'],
            'response_type_id' => ['required', 'exists:response_types,id'],
            'hotel_id' => ['nullable', 'exists:hotels,id'],
            'guide_id' => ['nullable', 'exists:guides,id'],
            'tour_id' => ['nullable', 'exists:tours,id'],
            'customer_name' => ['nullable', 'max:255', 'string'],
            'customer_tel_phone_number' => ['nullable', 'max:255', 'string'],
            'date' => ['nullable', 'date'],
        ];
    }
}
