<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreHabitRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:255'],
        ];
    }

    /**
     * Handle a passed validation attempt.
     */
    protected function passedValidation(): void
    {
        $this->merge(['uuid' => Str::uuid()]);
    }
}
