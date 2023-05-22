<?php

namespace App\Http\Requests\User;

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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {

        return [
            'name'=>'required|string|max:10||unique:users,name,'. $this->user_id,
            'email'=>'required|string|email|unique:users,email,' . $this->user_id,
            'password'=>'required|string|min:8',
            'role'=>'required|string',
        ];
    }
    public function messages(){
        return[
            'name.unique' => 'Користувач з даним логіном уже існує!',
            'email.unique' => 'Користувач з даною поштою вже існує!',
            'email.email' => 'Неправильний формат пошти!',
            'name.required'=>'Введіть імя!',
            'name.max'=>'Імя повинно бути не більше 10 символів!',
            'email.required'=>'Введіть пошту!',
            'password.required'=>'Введіть пароль!',
            'role.required'=>'Виберіть роль!',
            'password.min' => 'Пароль повинен складатися мінімум з 8 символів!',
        ];
    }
}
