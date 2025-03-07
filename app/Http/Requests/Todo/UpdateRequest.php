<?php

namespace App\Http\Requests\Todo;

use App\Enums\Color;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateRequest extends FormRequest
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
            'id' => ['required', 'integer'],
            'title' => ['required', 'string'],
            'memo' => ['nullable', 'string'],
            'color' => ['nullable', new Enum(Color::class)],
            'done' => ['required', 'boolean'],
        ];
    }
}
