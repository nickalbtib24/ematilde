<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Campana;
use App\InformeAsset;
class Asset extends Model
{
    protected $fillable = [
        'nombre_asset',
        'archivo_asset',
        'descripcion_asset',
        'fecha_inicio_asset',
        'fecha_finalizacion_asset'
    ];

    public function Campana() {
        return $this->belongsTo(Campana::class,'id_campana');
    }

    public function InformeAssets(){
        return $this->hasMany(InformeAsset::class, 'id_asset', 'id');
    }

}
