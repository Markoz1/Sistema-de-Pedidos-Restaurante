<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Pedido;

class Cuenta extends Model
{
    protected $table = 'cuenta';
    protected $primaryKey = 'cuenta_id';

    public $fillable = [
        'mesa','precio_total', 'estado_cuenta'
    ];
    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class,'cuenta_pedido','cuenta_id', 'pedido_id')
            ->withPivot('total_pedido')
            ->withTimestamps();

    }
}
