<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusquedaClienteRequest extends FormRequest
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
            'nit'=> 'required|numeric|exists:cliente,nit'
        ];
    }
    public function messages()
    {
        return [
            'nit.exists' => 'El Nit ingresado no existe, puede registrar un nuevo cliente presionado el boton Registrar.'
        ];
    }
}
