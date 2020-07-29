<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Поле 'Имя' обязательное",
            'email.required' => "Поле 'Email' обязательное",
            'email.email' => "Некорректный email",
            'email.unique' => "Данный email уже занят",
            'password.min' => "Поле 'Пароль' должно быть минимум 8 символов",
            'avatar.image' => 'Аватар должен быть картинкой (jpeg, jpg, png, svg)',
            'avatar.size' => "Размер фото должен быть меньше 2М",
        ];
    }
}
