<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserStoreRequest extends FormRequest
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
            
            'create_level' => 'required|integer|between:1,2',
            'create_name' => 'required|regex:/^[\pL\s]+$/u|max:100',
            'create_last_name'  => 'required|regex:/^[\pL\s]+$/u|max:100',
            'create_photo' => 'image',
            'create_pass' => 'required|min:8|confirmed|max:20',
            'create_pass_rem' => 'required|max:200',
            'create_age' => 'required|before:today',
            'create_phone' => 'nullable|numeric|digits:11',
            'create_email' => 'required|email|unique:users,email',
            'create_occup_time' => 'nullable|integer|min:1',
        ];
    }
    public function messages()
    {
        return[
            //regras
            'create_level.required' => 'O nível de acesso é obrigatório',
            'create_level.integer' => 'O nível deve ser um número inteiro',
            'create_level.between' => 'O nível deve ser 1(Master) ou 2(Admin)',

            'create_name.required' => 'O campo nome é obrigatório',
            'create_name.regex' => 'Esse campo aceita apenas letras',
            'create_name.max' => 'Tamanho máximo de 200 caracteres',

            'create_last_name.required' => 'O campo sobrenome é obrigatório',
            'create_last_name.regex' => 'Esse campo aceita apenas letras',
            'create_last_name.max' => 'Tamanho máximo de 200 caracteres',

            'create_photo.image' => 'Você deve inserir um arquivo de imagem',

            'create_pass.required' => 'O campo senha é obrigatório',
            'create_pass.min' => 'O tamanho mínimo para a senha deve ser 8 caracteres',
            'create_pass.confirmed' => 'As senhas digitadas não conferem',
            'create_pass.max' => 'Tamanho máximo de 20 caracteres',

            'create_pass_rem.required' => 'Insira um lembrete para sua senha',
            'create_pass_rem.max' => 'Tamanho máximo de 200 caracteres',

            'create_age.required' => 'É obrigatório informar uma data de nascimento',
            'create_age.before' => 'A data deve ser anterior a data de hoje',

            'create_phone.numeric' => 'Você deve digitar apenas números',
            'create_phone.digits' => 'O telefone deve conter 11 dígitos(contando com o DDD)',

            'create_email.required' => 'É obrigatório informar um endereço de e-mail',
            'create_email.email' => 'Digite um endereço de e-mail válido',
            'create_email.unique' => 'E-mail já cadastrado',

            'create_occup_time.integer' => 'O tempo de carreira deve ser um número inteiro',
            'create_occup_time.min' => 'O tempo de carreira deve ser no mínimo 1 ano (caso tenha menos coloque 1 ano)',

        ];
    }
}