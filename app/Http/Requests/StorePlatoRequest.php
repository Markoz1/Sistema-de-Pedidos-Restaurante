<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlatoRequest extends FormRequest
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
            'precio' => 'required',
            'descripcion' => 'required',
            'foto' => 'nullable|image',
            'id_categoria' => 'required'

        ];
    }
    public function attributes()
    {
        return [
            'id_categoria' => 'categoria'
        ];
    }
}
