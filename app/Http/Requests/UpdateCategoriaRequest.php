<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoriaRequest extends FormRequest
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
            'nombreCategoria' => 'required|unique:categoria,nombre|min:3|max:50|regex:/^[\pL\s]+$/u',
        ];
    }
    public function messages()
    {
        return [
            'nombreCategoria.regex' => 'El campo nombre sólo puede contener letras y espacios.',
        ];
    }
}
