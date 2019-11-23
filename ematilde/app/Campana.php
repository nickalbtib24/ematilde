<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\InformeCampana;
class Campana extends Model
{
    public function User(){
        return $this->belongsTo(User::class,'id_usuario');
    }

    public function InformeCampanas(){
        return $this->hasMany(InformeCampana::class,'id_campana','id');
    }
}
