<?php

namespace App\Model;

use App\Model\Pedido;
use App\Model\Categoria;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'producto_id';

    public $fillable = [
        'producto_id','estado_id','nombre', 'precio', 'descripcion', 'foto', 'categoria_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function scopeBuscar($query,$busqueda,$estado,$categoria){
        //dd($criterio);
        if (trim($busqueda) != ""){
            switch($estado){
                case 300 and 0: //no se restringe estado
                switch ($categoria){
                    case 300 and 0:$query->where("nombre","LIKE","%$busqueda%"); //no restringe categoria
                    break;
                    default:$query->where("nombre","LIKE","%$busqueda%")->where("categoria_id","$categoria");//restringimos categoria                  
                    break;
                }                
                break;
                default: 
                switch ($categoria){
                    case 300 and 0:$query->where("nombre","LIKE","%$busqueda%")->where("estado_id","$estado"); //no restringe categoria solo estado
                    break;
                    default:$query->where("nombre","LIKE","%$busqueda%")->where("estado_id","$estado")->where("categoria_id","$categoria"); //retringe categoria y estado                  
                    break;
                }  
                break;                
            }
        }       
    }
    
    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_producto', 'producto_id', 'pedido_id')
            ->withPivot('cantidad', 'subtotal')
            ->withTimestamps();
            
    }
}
