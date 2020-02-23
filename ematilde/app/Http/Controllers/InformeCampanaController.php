<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InformeCampana;
use App\Campana;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\HeadingRowImport;


class InformeCampanaController extends Controller
{
    public function createInformeCampana(Request $request){
        $input = $request->all();
        $validator = $this->validator($input);
        if($validator->passes()){
            $informe_campana = InformeCampana::create([
                'reach' => $input['reach'],
                'budget' => $input['budget'],
                'result' => $input['result'],
                'impressions' => $input['impressions'],
                'estimated_add_recall' => $input['estimated_add_recall'],
                'ammount_spent' => $input['ammount_spent'],
                'frequency' => $input['frequency'],
                'video_clicks' => $input['video_clicks'],
                'post_reaction' => $input['post_reaction'],
                'carrousel_clicks' => $input['carrousel_clicks'],
                'link_clicks' => $input['link_clicks'],
                'cost_per_result' => $input['cost_per_result'],
                'bid_strategy' => $input['bid_strategy'],
                'date' => $input['date'],
                'fecha_ultima_actualizacion' => $input['fecha_ultima_actualizacion'],
                'fecha_cracion' => $input['date'],
                'state' => $input['state']
            ]);
            $campana = Campana::find($input['id_campana']);
            $informe_campana->campana()->associate($campana);
            $informe_campana->save();
            $campana->informeCampanas()->save($informe_campana);
            return response()->json([
                'success' => 'A new report has been created successfully']);
        }
        else{
            return response()->json($validator->messages());
        }

        
    }
 
    public function createInformeCampanaFile(Request $request){

        $path = $request->file('file')->getRealPath();
        //$data = array_map('str_getcsv', file($path));
        $data = Excel::import(new InformeCampana ,$path);

        
        return $data;
    }

    public function validator(array $data){
        return Validator::make($data, [
            'reach' => 'required|integer',
            'budget' => 'required|integer',
            'result' => 'required|integer',
            'impressions' => 'required|integer',
            'estimated_add_recall' => 'required|integer',
            'ammount_spent' => 'required|integer',
            'frequency' => 'required|integer',
            'video_clicks' => 'required|integer',
            'post_reaction' => 'required|integer',
            'carrousel_clicks' => 'required|integer',
            'link_clicks' => 'required|integer',
            'cost_per_result' => 'required|integer',
            'bid_strategy' => 'required|integer',
            'date' => 'required',
            'fecha_ultima_actualizacion' => 'required',
        ]);

    }
}
