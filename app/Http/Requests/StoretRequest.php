<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoretRequest extends FormRequest
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
            'name-ar' => 'required|unique:posts|max:255',
            'name-en' => 'required|unique:posts|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name-ar.required' => trans("validation.required"),
            'name-en.required' => trans("validation.required"),
        ];
    }
}
