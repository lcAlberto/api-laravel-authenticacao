<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        dd($this->all());
        return [
            'name' => 'required|string|min:1|max:100',
            'email' => 'required|email|unique:users,email|min:1|max:100',
            'password' => 'required|confirmed|min:6|max:100',
        ];
    }
}
