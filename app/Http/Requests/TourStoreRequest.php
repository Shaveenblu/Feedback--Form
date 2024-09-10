<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TourStoreRequest extends FormRequest
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
                'unique:tours,unique_id',
                'max:255',
                'string',
            ],
            'tour_operator' => ['required', 'max:255', 'string'],
            'tour_name' => ['required', 'max:255', 'string'],
            'tour_start_date' => ['required', 'date'],
            'tour_no' => ['required', 'max:255', 'string'],
        ];
    }
}
