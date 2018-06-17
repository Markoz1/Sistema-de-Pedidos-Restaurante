<?php

namespace App\Model;

use App\Model\User;
use App\Model\Producto;
use App\Model\Cuenta;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = 'pedido_id';

    public $fillable = [
        'total','estado_pedido','cuenta_id'
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pedido_producto', 'pedido_id', 'producto_id')
            ->withPivot('cantidad', 'subtotal')
            ->withTimestamps();
    }

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class, 'cuenta_id');
    }

    public function productosSeed($semilla){
        return $this->belongsToMany(Producto::class, 'pedido_producto', $semilla->pedidp_id, $semilla->producto_id)
            ->withPivot($semilla->cantidad, $semilla->subtotal)
            ->withTimestamps();
    }
}
