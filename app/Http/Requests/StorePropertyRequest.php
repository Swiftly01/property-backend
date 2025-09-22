<?php

namespace App\Http\Requests;

use App\Enums\LocationEnum;
use App\Enums\PropertyStatusEnum;
use App\Enums\PropertyTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StorePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if($this->filled('features')){
            $this->merge([
             'features' => json_encode(array_filter(array_map("trim", explode("\n", $this->features))))
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sell_request_id' => ['nullable', 'exists:sell_requests,id'],
            'title' => ['required', 'string', 'max:255'],
            'status' => ['required', new Enum(PropertyStatusEnum::class)],
            'type' => ['required', new Enum(PropertyTypeEnum::class)],
            'location' => ['required', new Enum(LocationEnum::class)],
            'price' => ['required', 'decimal:2', 'min:0'],
            'description' => [
                'required',
                'string',
                'max:2000'
            ],
            'thumbnail' => [
                'required',
                'image',
                'mimes:png,jpg,jpeg,',
                'max:1024'
                // 'dimensions:min_width=400,min_height=400'
            ],
            'other_images' => ['required', 'array', 'min:2', 'max:4'],
            'other_images.*' => [
                'image',
                'mimes:png,jpg,jpeg',
                'max:1024'
                //  'dimensions:min_width=400,min_height=400'
            ],
            'features' => ['nullable', 'string', 'max:3000']


        ];
    }
}
