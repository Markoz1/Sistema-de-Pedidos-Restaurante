<?php

namespace App\Http\Requests;

use App\Model\Role;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'nombre' => 'required|min:3|max:50|regex:/^[\pL\s]+$/u',            
            'phone' => 'nullable|digits:8',            
            'direccion' => 'nullable|min:0|max:70|',
            'username' => 'required|unique:users,username|alpha|min:3',
            'ci' => 'required|unique:users,ci|numeric|digits_between:7,8',
            'foto' => 'nullable|image|max:5120',
            'estado' => 'required',
            'role_id' => ['required',Rule::in($roles)],
        ];
    }
}
