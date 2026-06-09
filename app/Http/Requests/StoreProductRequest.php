<?php

namespace App\Http\Requests;

use App\Enums\EStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreProductRequest extends FormRequest
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
            'product_name' => ['required'],
            'product_description' => ['required'],
            'quantity' => ['required','integer'],
            'price' => ['required','integer'],
            'status' =>[new Enum(EStatus::class)]
        ];
    }
}
