<?php

namespace App\Http\Requests;

use App\Enums\PropertyTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreSellRequest extends FormRequest
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
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'unique:sell_requests','email:rfc,dns', 'max:255'],
             'phone_number' => ['required','regex:/^(080|091|090|070|081)[0-9]{8}$/'],
             'location' => ['nullable', 'string'],
             'address' => ['required', 'string'],
             'description' => ['required', 'string', 'max:900'],
             'property_type' => ['required', new Enum(PropertyTypeEnum::class)],
             'status' => ['nullable'],
        ];
    }

    public function messages()
    {
        return [
            'phone_number.regex' => 'Enter a valid phone number (e.g. 08012345678).',

        ];
    }
}
