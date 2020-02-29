<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Campana;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class InformeCampana extends Model implements ToModel, WithStartRow
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

    public function model(array $row)
    {
        return new InformeCampana([
            'reach'     => $row[11],
            'ammount_spent'    => $row[14],
            'cost_per_result' =>$row[13],
            'impressions' => $row[12],
            'result' => $row[9],            
        ]);
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
}
