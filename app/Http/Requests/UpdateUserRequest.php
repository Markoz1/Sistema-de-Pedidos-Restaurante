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
            'nombre' => 'required|min:3|max:50|regex:/^[\pL\s]+$/u',            
            'phone' => 'nullable|digits:8',            
            'direccion' => 'nullable|min:0|max:70',
            'username' => 'required|alpha_dash|min:3',
            'ci' => 'required|numeric|digits_between:7,8',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'estado' => 'required',
            'role_id' => 'required',
            // 'role_id' => ['required',Rule::in($users)],
        ];
    }
    public function messages()
    {
        return [
            'nombre.regex' => 'El campo nombre sólo puede contener letras y espacios.',
        ];
    }
}
