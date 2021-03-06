<?php

namespace App\Http\Requests;

use App\Model\Categoria;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'descripcion' => 'required|regex:/^[a-zA-Z0-9\s]+$/u|max:255',
            'foto' => 'image|max:5120',
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
