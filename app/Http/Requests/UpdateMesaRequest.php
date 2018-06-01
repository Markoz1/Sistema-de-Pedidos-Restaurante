<?php

namespace App\Http\Requests;

use App\Rules\RuleExists;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMesaRequest extends FormRequest
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
            'nombre' => 'required',
            'numero' => ['required', 'numeric', 'min:1', 'max:50',new RuleExists($this->request->get('nombre'),'users','nombre',$this->request->get('mesa_id'))],
            'estado' => 'required',
            'username' => 'required|alpha_num|unique:users,username,'.$this->request->get('mesa_id').',id',
            'password' => 'nullable|min:4|max:20|confirmed',
        ];
    }
}
