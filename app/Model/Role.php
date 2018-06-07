<?php

namespace App\Model;

use App\Model\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id';

    public $fillable = [
        'nombre', 'decripcion'
    ];

    public function Users()
    {
        return $this->hasMany(User::class);
    }
}
