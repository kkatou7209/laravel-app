<?php

namespace App\Http\Requests\Todo;

use App\Enums\Color;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
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
            'date' => ['nullable', 'date_format:Y-m-d'],
            'time' => ['nullable', 'date_format:H:i'],
            'color' => ['nullable', new Enum(Color::class)],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'ToDoのタイトルが入力されていません',
        ];
    }
}
