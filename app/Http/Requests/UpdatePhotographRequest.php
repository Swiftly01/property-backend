<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePhotographRequest extends StorePhotographsRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules['thumbnail'] = ['bail', 'nullable', 'image', 'mimes:png,jpg,jpeg', 'max:1024'];
        $rules['other_images'] = ['bail', 'sometimes', 'array', 'min:1', 'max:4'];

        return $rules;
    }
}
