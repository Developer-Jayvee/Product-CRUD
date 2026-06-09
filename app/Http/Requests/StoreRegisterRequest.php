<?php

namespace App\Http\Requests;

use App\Enums\EStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Override;

class StoreRegisterRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email_address' => ['email','exists:users_table,email'],
            'mobile_number' => ['required','string'],
            'password' => ['required','min:8','regex:/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/'],
            'address' => ['required'],
            'status' => [new Enum(EStatus::class)]
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            'email_address.exists' => 'Email is already registered on an account. Please use another email.',
            'mobile_number.required' => 'Mobile Number is required',
            'password.regex' => 'The password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.',
        ];
    }
}
