<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
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
        $categorias = Categoria::pluck('categoria_id')->toArray();
        return [
            'nombre' => 'required|min:3|max:80|regex:/^[\pL\s]+$/u',
            'precio' => 'required|numeric|min:0.1|max:9999.00',
            'descripcion' => 'required|min:4|max:255',
            'foto' => 'required|image|max:5120',
            'categoria_id' => ['required',Rule::in($categorias)],
        ];
    }
    public function attributes()
    {
        return [
            'categoria_id' => 'categoria'
        ];
    }

    public function messages()
    {
        return [
            'nombre.regex' => 'El campo nombre sólo puede contener letras y espacios.',
        ];
    }
}
