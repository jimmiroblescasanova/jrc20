<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:10', 'string'],
            'subtitle' => ['nullable', 'min:10', 'string'],
            'summary' => ['nullable', 'min:10', 'string'],
            'date' => ['required', 'date'],
            'image' => ['nullable', 'image'],
        ];
    }
}
