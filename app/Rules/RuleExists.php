<?php

namespace App\Rules;

use App\Model\User;
use Illuminate\Contracts\Validation\Rule;

class RuleExists implements Rule
{
    public $nombre;
    public $tabla;
    public $columna;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($nombre,$tabla,$columna)
    {
        $this->nombre = $nombre;
        $this->tabla = $tabla;
        $this->columna = $columna;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $nombre_mesa = $this->nombre." ".$value;
        $cant_mesas = User::where('nombre',$nombre_mesa)->count();
        if($cant_mesas > 0){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El valor del campo nombre ya está en uso.';
    }
}
