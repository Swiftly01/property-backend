<?php

namespace App\Http\Requests;

use App\Enums\LocationEnum;
use App\Enums\PropertyStatusEnum;
use App\Enums\PropertyTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdatePropertyRequest extends StorePropertyRequest
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
        // return [
        //      'sell_request_id' => ['nullable', 'exists:sell_requests,id'],
        //     'title' => ['required', 'string', 'max:255'],
        //     'status' => ['required', new Enum(PropertyStatusEnum::class)],
        //     'type' => ['required', new Enum(PropertyTypeEnum::class)],
        //     'location' => ['required', new Enum(LocationEnum::class)],
        //     'price' => ['required', 'decimal:2', 'min:0'],
        //     'description' => ['required', 'string', 'max:1000'],
        //     'thumbnail' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
        //     'other_images' => ['nullable', 'array', 'min:1'],
        //     'other_images.*' => ['image', 'mimes:png,jpg,jpeg','max:1024']
        // ];

        $rules = parent::rules();
        $rules['thumbnail'] = ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:1024'];
        $rules['other_images'] = ['sometimes', 'array', 'min:1', 'max:4'];


        return $rules;
    }
}
