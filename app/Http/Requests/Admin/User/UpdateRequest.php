<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required | string',
            'email' => 'required | string | email | unique:users,email,' . $this->user_id,
            'user_id' => 'required | integer | exists:users,id',
            // 'password' => 'required | string',
            'role' => 'required | numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле "Имя пользователя" обязательно для заполнения',
            'name.string' => 'Поле "Имя пользователя" должно соответствовать строчному типу',
            'email.required' => 'Поле "E-mail пользователя" обязательно для заполнения',
            'email.string' => 'Поле "E-mail пользователя" должно соответствовать строчному типу',
            'email.email' => 'Введите адрес электронной почты',
            'email.unique' => 'Пользователь с таким e-mail уже существует',
            // 'password.required' => 'Поле "Пароль пользователя" обязательно для заполнения',
            // 'password.string' => 'Поле "Пароль пользователя" должно соответствовать строчному типу',
            'role.required' => 'Поле "Роль пользователя" обязательно для заполнения',
            'role.numeric' => 'Выберите роль пользователя',
        ];
    }
}
