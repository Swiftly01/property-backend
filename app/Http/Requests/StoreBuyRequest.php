<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBuyRequest extends FormRequest
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
            'property_id' => ['bail', 'required', 'integer', 'exists:properties,id'],
            'firstname' => ['bail', 'required', 'string', 'max:255'],
            'lastname' => ['bail', 'required', 'string', 'max:255'],
            'email' => ['bail', 'required', 'email:rfc,dns'],
            'phone_number' => ['bail', 'required', 'regex:/^(080|091|090|070|081)[0-9]{8}$/'],
            'message' => ['nullable', 'string', 'max:500'],
            'terms' => ['accepted']

        ];
    }

    public function messages()
    {
        return [
            'phone_number.regex' => 'Enter a valid phone number (e.g. 08012345678).',
            'terms.accepted' => 'You must accept the terms and condition',

        ];
    }
}
