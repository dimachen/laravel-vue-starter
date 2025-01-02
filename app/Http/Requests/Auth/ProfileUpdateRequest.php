<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user()->id)
            ],
            'current_password' => ['required_with:password', 'current_password'],
            'password' => [
                'nullable',
                'confirmed',
                Password::defaults()
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле имя обязательно для заполнения',
            'email.required' => 'Поле email обязательно для заполнения',
            'email.email' => 'Введите корректный email адрес',
            'email.unique' => 'Такой email уже используется',
            'current_password.required_with' => 'Для смены пароля необходимо указать текущий пароль',
            'current_password.current_password' => 'Неверный текущий пароль',
            'password.confirmed' => 'Пароли не совпадают',
        ];
    }
}
