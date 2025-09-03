<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'name' => 'required|min:2|max:255|regex:/^[A-Za-zА-Яа-яЁё\s]+$/u',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|max:255|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Имя должно быть обязательно указано',
            'name.min' => 'Имя должно содержать минимально 2 символа',
            'email.required' => 'Логин должен быть обязательно указано',
            'email.email' => 'Укажите @',
            'email.unique' => 'Логин занято',
            'password.required' => 'Заполните пароль',
            'password.min' => 'Пароль должен быть минимально 4 символа',
            'password.confirmed' => 'Пароль не совпадает',
        ];
    }
}
