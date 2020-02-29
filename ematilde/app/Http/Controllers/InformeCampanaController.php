<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InformeCampana;
use App\Campana;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\HeadingRowImport;
use Illuminate\Http\Response;


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
        try{
            $path = $request->file('file')->getRealPath();
            $customerArr = $this->csvToArray($path);
            $campana = Campana::find($request['campaign']);
            if(!array_key_exists('Results', $customerArr[0])){
                return response()->json(['error' => 'The file does not have Results column'], 401);
            }
            if(!array_key_exists('Cost per Results', $customerArr[0])){
                return response()->json(['error' => 'The file does not have Cost per Results column'], 401);
            }
            if(!array_key_exists('Impressions', $customerArr[0])){
                return response()->json(['error' => 'The file does not have Impressions column'], 401);
            }
            if(!array_key_exists('Link Clicks', $customerArr[0])){
                return response()->json(['error' => 'The file does not have Link Clicks column'], 401);
            }
            if(count($customerArr) !== 0) {
                for ($i = 0; $i < count($customerArr); $i ++)
                {
                    $customer = $customerArr[$i];
                    if($customer['Results'] === '') {
                        $customer['Results'] = 0;
                    }
                    if ($customer['Cost per Results'] === '') {
                        $customer['Cost per Results'] = 0;
                    }
                    if ($customer['Impressions'] === '') {
                        $customer['Impressions'] = 0;
                    }
                    if($customer['Link Clicks'] === '') {
                        $customer['Link Clicks'] = 0;
                    }
                    $date = strtotime($customer['Reporting Starts']);
                    $newFormat = date('Y-m-d',$date);
        
                    $fecha_cracion = strtotime($customer['Reporting Starts']);
                    $newFormat2 = date('Y-m-d',$fecha_cracion);
        
                    $informe_campana = InformeCampana::create([
                        'reach' => $customer['Reach'],
                        'result' => $customer['Results'],
                        'impressions' => $customer['Impressions'],
                        'ammount_spent' => $customer['Amount Spent (USD)'],
                        'cost_per_result' => $customer['Cost per Results'],
                        'link_clicks' => $customer['Link Clicks'],
                        'date' => $newFormat,
                        //'fecha_ultima_actualizacion' => $customer['fecha_ultima_actualizacion'],
                        'fecha_cracion' => $newFormat2,
                    ]);
                    $informe_campana->campana()->associate($campana);
                    $informe_campana->save();
                    $campana->informeCampanas()->save($informe_campana);
                    
                } 
            }
            return response()->json([
                'message' => 'A new report has been uploaded successfully'], 200);
        } catch(Exception $e){
            return Response::json(array(
                'code' => 401,
                'message' => 'The file is not well formed'
            ));
        }
    
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

    public function csvToArray($filename) {
        $delimiter = ';';
        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }
}
