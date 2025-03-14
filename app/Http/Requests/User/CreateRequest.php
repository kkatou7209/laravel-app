<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CreateRequest extends FormRequest
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
            'username' => ['required', 'string'],
            'email' => ['required', 'email:refc,dns', 'unique:users,email'],
            'password' => ['required', Password::defaults()],
            'password_confirmed' => ['required', 'same:password'],
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'ユーザー名は必ず入力してください',
            'email.required' => 'メールアドレスは必ず入力してください',
            'email.email' => '不正なフォーマットです',
            'password.required' => 'パスワードは必ず入力してください',
            'password.password' => '8文字以上使って作成してください',
            'password_confirmed' => 'パスワードが一致しません',
        ];
    }
}
