<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerFormUrlUpdateRequest extends FormRequest
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
            'url_link' => ['required', 'max:255', 'string'],
            'unique_id' => [
                'required',
                Rule::unique('customer_form_urls', 'unique_id')->ignore(
                    $this->customerFormUrl
                ),
                'max:255',
                'string',
            ],
            'customer_id' => ['required', 'exists:customers,id'],
            'tour_id' => ['required', 'exists:tours,id'],
            'status' => ['required', 'in:Completed,In progress'],
            'date' => ['required', 'date'],
            'other_details' => ['required', 'max:255', 'string'],
        ];
    }
}
