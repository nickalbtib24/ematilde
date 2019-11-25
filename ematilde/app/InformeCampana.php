<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Campana;
class InformeCampana extends Model
{

    protected $fillable = [
        'reach',
        'budget',
        'result',
        'impressions',
        'estimated_add_recall',
        'ammount_spent',
        'frequency',
        'video_clicks',
        'post_reaction',
        'carrousel_clicks',
        'link_clicks',
        'cost_per_result',
        'bid_strategy',
        'date',
        'fecha_ultima_actualizacion',
        'fecha_cracion',
        'state'
    ];

    public function campana(){
        return $this->belongsTo(Campana::class,'id_campana');
    }
}
