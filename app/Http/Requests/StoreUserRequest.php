<?php

namespace App\Http\Requests;

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
        // $users = User::pluck('id')->toArray();
        return [
            'nombre' => 'required|min:3|max:70|regex:/^[\pL\s]+$/u',
            'ci' => 'required|numeric|digits:8',
            'phone' => 'required|digits:8',
            'direccion' => 'min:4|max:255',
            'foto' => 'image|max:5120',
            'estado' => 'required',
            'role_id' => 'required',
            // 'role_id' => ['required',Rule::in($users)],
        ];
    }
}
