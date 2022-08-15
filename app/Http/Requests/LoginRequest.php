<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'log_email' => 'required|email|exists:users,email',
            'log_pass' => 'required|min:8',
        ];
    }
    public function messages()
    {
        return[
            //regras
            'log_email.required' => 'É obrigatório informar um endereço de e-mail',
            'log_email.email' => 'Digite um endereço de e-mail válido',
            'log_email.exists' => 'E-mail ainda não cadastrado',

            'log_pass.required' => 'É obrigatório informar uma senha',
            'log_pass.min' => 'A senha deve conter no mínimo 8 caracteres',
        ];
    }
}
