<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Campana;
class TipoCampana extends Model
{
    
    public function Campanas(){
        return $this->hasMany(Campana::class,'id_tipo_campana','id');
    }
}
