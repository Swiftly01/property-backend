<?php

namespace App\Http\Requests;

use App\Enums\PropertyMediaTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StorePropertyMediaRequest extends FormRequest
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
        $isPodcastRoute = $this->routeIs('podcasts.*');

        return [
            'title' => ['bail', 'required', 'string', 'max:255'],
            'property_id' => $isPodcastRoute ? ['required', 'exists:properties,id'] :  ['nullable', 'exists:properties,id'],
            'type' => ['required', new Enum(PropertyMediaTypeEnum::class)],
            'location' => ['bail', 'required', 'string'],
            'video_url' => $isPodcastRoute  ? ['required',  'url'] : ['nullable',  'url'],
            'description' => ['bail', 'required', 'max:1500'],
            'thumbnail' => ['bail', 'required', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'other_images' => $isPodcastRoute ? ['bail', 'nullable', 'array', 'min:0', 'max:0'] : ['bail', 'required', 'array', 'min:2', 'max:4'],
            'other_images.*' => ['bail', 'image', 'mimes:png,jpg,jpeg', 'max:1024']
        ];
    }
}
