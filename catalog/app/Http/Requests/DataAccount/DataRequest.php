<?php

namespace App\Http\Requests\DataAccount;

use Illuminate\Foundation\Http\FormRequest;

class DataRequest extends FormRequest
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
            'name'=>'required|string|unique:users,'. auth()->user()->id,
            'email'=>'required|string|email|unique:users,email,' . auth()->user()->id,
            'password'=>'nullable|string|min:8',
            'confirm_password' => 'nullable|required_with:password|same:password',
        ];
    }
    public function messages(){
        return[
            'email.unique' => 'Користувач з даною поштою вже існує!',
            'email.email' => 'Неправильний формат пошти!',
            'name.required'=>'Введіть імя!',
            'name.unique'=>'Це імя використовується іншим користувачем!',
            'email.required'=>'Введіть пошту!',
            'password.required'=>'Введіть пароль!',
            'confirm_password.same' => 'Підтвердження пароля не співпадає з введеним паролем!',
            'password.min' => 'Пароль повинен складатися мінімум з 8 символів!',
        ];
    }
}
