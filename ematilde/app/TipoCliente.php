<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class TipoCliente extends Model
{
    protected $fillable = [
        'nombre_tipo_cliente',
    ];

    public function users()
    {
        return $this->hasMany(User::class,'id_tipo_cliente','id');
    }

}
