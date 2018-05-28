<?php

namespace App\Model;

use App\Model\Producto;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = 'pedido_id';

    public $fillable = [
        'mesa', 'total','estado_pedido'
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pedido_producto', 'pedido_id', 'producto_id')
            ->withPivot('cantidad', 'subtotal')
            ->withTimestamps();
    }
}
