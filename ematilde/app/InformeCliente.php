<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class InformeCliente extends Model
{
    public function User(){
        return $this->belongsTo(User::class,'id_usuario');
    }
}
