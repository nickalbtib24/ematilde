<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Campana;
class InformeCampana extends Model
{
    public function Campana(){
        return $this->belongsTo(Campana::class,'id_campana');
    }
}
