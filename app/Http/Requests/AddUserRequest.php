<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|string|min:8",
            "age" => "integer|gt:0"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Поле 'Имя' обязательное",
            "email.required" => "Поле 'Email' обязательное",
            "email.email" => "Некорректный email",
            "email.unique" => "Данный email уже занят",
            "password.required" => "Поле 'Пароль' обязательное",
            "password.min" => "Поле 'Пароль' должно быть минимум 8 символов",
            "age.gt" => "Возраст должен быть больше 0",
            "age.integer" => "Возраст должен быть числом"
        ];
    }
}
