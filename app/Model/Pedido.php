<?php

namespace App\Model;

use App\Model\Producto;
use App\Model\Cuenta;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = 'pedido_id';

    public $fillable = [
        'pedido_id','mesa', 'total','estado_pedido'
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pedido_producto', 'pedido_id', 'producto_id')
            ->withPivot('cantidad', 'subtotal')
            ->withTimestamps();
    }
    public function cuentas()
    {
        return $this->belongsToMany(Cuenta::class, 'cuenta_pedido', 'pedido_id', 'cuenta_id')
            ->withPivot('total_pedido')
            ->withTimestamps();
    
    }
    public function productosSeed($semilla){
        return $this->belongsToMany(Producto::class, 'pedido_producto', $semilla->pedidp_id, $semilla->producto_id)
            ->withPivot($semilla->cantidad, $semilla->subtotal)
            ->withTimestamps();
    }
}
