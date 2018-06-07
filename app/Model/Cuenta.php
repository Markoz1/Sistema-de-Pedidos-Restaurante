<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Pedido;

class Cuenta extends Model
{
    protected $table = 'cuenta';
    protected $primaryKey = 'cuenta_id';

    public $fillable = [
        'cuenta_id','estado_pago','total', 'pedido_id','cliente_id'
    ];
    /*
    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class,'cuenta_pedido','cuenta_id', 'pedido_id')
            ->withPivot('total_pedido')
            ->withTimestamps();

    }*/
    public function pedido(){
        return $this->belongsTo(Pedido::class,'pedido_id');
    }
}
