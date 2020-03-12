<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\InformeCampana;
use App\Asset;
class Campana extends Model
{
    protected $fillable = [
        'nombre_campana',
        'negocio_campana',
        'fecha_inicio_campana',
        'fecha_terminacion_campana',
        'expected_budget'
    ];

    public function User(){
        return $this->belongsTo(User::class,'id_usuario');
    }

    public function TipoCampana(){
        return $this->belongsTo(TipoCampana::class,'id_tipo_campana');
    }

    public function InformeCampanas(){
        return $this->hasMany(InformeCampana::class,'id_campana','id');
    }

    public function Assets(){
        return $this->hasMany(Asset::class, 'id_campana', 'id');
    }

}
