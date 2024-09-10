<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class HotelUpdateRequest extends FormRequest
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
            'hotel_name' => ['required', 'max:255', 'string'],
            'hotel_place' => ['required', 'max:255', 'string'],
            'unique_id' => [
                'required',
                Rule::unique('hotels', 'unique_id')->ignore($this->hotel),
                'max:255',
                'string',
            ],
        ];
    }
}
