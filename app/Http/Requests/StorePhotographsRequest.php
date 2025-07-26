<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhotographsRequest extends FormRequest
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
        return [
            'title' => ['bail', 'required', 'string', 'max:255'],
            'location' => ['bail', 'required', 'string'],
            'video_url' => ['nullable',  'url'],
            'description' => ['bail', 'required', 'max:1500'],
            'thumbnail' => ['bail', 'required', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'other_images' => ['bail', 'required', 'array', 'min:2', 'max:4'],
            'other_images.*' => ['bail','image', 'mimes:png,jpg,jpeg', 'max:1024' ]
        ];
    }
}
