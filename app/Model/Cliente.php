<?php

namespace App\Model;

use App\Model\Cuenta;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'cliente_id';

    public $fillable = [
        'nombre','nit', 'telefono', 'direccion'
    ];
    
    public function cuentas()
    {
        return $this->hasMany(Cuenta::class, 'cliente_id');
    }
}
