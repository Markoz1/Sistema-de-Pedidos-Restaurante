<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = 'cuenta';
    protected $primaryKey = 'pedido_id';

    public $fillable = [
        'mesa','precio_total', 'estado_cuenta'
    ];
}
