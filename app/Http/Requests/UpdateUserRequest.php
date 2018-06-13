<?php

namespace App\Http\Requests;

use App\Model\Role;
use Illuminate\Validation\Rule;
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
        $roles = Role::pluck('id')->toArray();
        return [
            // 'nombre' => 'required|min:3|max:50|regex:/^[\pL\s]+$/u',            
            'nombre' => 'required|min:3|max:50|regex:/^[a-zA-Z0-9\s.]+$/',
            'phone' => 'nullable|digits:8',            
            'direccion' => 'nullable|string|min:0|max:70',
            'username' => 'required|regex:/^[0-9A-Za-z.\-_]+$/|min:3|max:20',
            'ci' => 'required|numeric|digits_between:7,8',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'estado' => 'required',
            'role_id' => ['required',Rule::in($roles)],
        ];
    }
    public function messages()
    {
        return [
            'nombre.regex' => 'El campo nombre sólo puede contener letras, números, espacios y puntos.',
        ];
    }
}
