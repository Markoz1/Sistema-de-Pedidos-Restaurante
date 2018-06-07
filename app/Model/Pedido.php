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
        'total', 'users_id','estado_pedido'
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pedido_producto', 'pedido_id', 'producto_id')
            ->withPivot('cantidad', 'subtotal')
            ->withTimestamps();
    }

    public function mesa()
    {
        return $this->belongsTo(User::class,'users_id');
    }

    public function cuentas()
    {
        return $this->belongsToMany(Cuenta::class, 'cuenta_pedido', 'pedido_id', 'cuenta_id')
            ->withPivot('total_pedido')
            ->withTimestamps();
    }
}
