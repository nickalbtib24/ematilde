<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Asset;
class InformeAsset extends Model
{
    protected $fillable = [
        'impressions',
        'cost_per_result',
        'ammount_spent',
        'link_clicks',
        'reach',
        'fecha_ultima_actualizacion',
        'fecha_cracion',
    ];

    public function Asset(){
        return $this->belongsTo(Asset::class, 'id_asset');
    }
}
