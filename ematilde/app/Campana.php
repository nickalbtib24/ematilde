<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\InformeCampana;
class Campana extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'nombre_campana',
        'negocio_campana',
        'fecha_inicio_campana',
        'fecha_terminacion_campana',
    ];

    public function User(){
        return $this->belongsTo(User::class,'id_usuario');
    }

    public function TipoCampana(){
        return $this->belongsTo(TipoCampana::class,'id');
    }

    public function InformeCampanas(){
        return $this->hasMany(InformeCampana::class,'id_campana','id');
    }
}
