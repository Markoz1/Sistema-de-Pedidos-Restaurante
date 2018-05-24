<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'cliente_id';

    public $fillable = [
        'cliente_id','nombre','nit', 'telefono', 'direccion'
    ];
}
