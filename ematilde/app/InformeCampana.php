<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Campana;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class InformeCampana extends Model 
{

    protected $fillable = [
        'reach',
        'budget',
        'result',
        'impressions',
        'landing_page_views',
        'ammount_spent',
        'frequency',
        'video_clicks',
        'post_reaction',
        'budget_spent',
        'link_clicks_done',
        'link_clicks',
        'cost_per_result',
        'cost_per_landing_page_view',
        'date',
        'fecha_ultima_actualizacion',
        'fecha_cracion',
        'state'
    ];

    public function campana(){
        return $this->belongsTo(Campana::class,'id_campana');
    }
}
