<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\InformeAsset;
use Carbon\Carbon;
    
class InformeAssetController extends Controller
{
    public function addReportAsset(Request $request){
        try{
            $path = $request->file('file')->getRealPath();
            $customerArr = $this->csvToArray($path);
            $asset = Asset::find($request['asset']);
            if(!array_key_exists('Cost per Results', $customerArr[0])){
                return response()->json(['error' => 'The file does not have Cost per Results column'], 401);
            }
            if(!array_key_exists('Impressions', $customerArr[0])){
                return response()->json(['error' => 'The file does not have Impressions column'], 401);
            }
            if(!array_key_exists('Link Clicks', $customerArr[0])){
                return response()->json(['error' => 'The file does not have Link Clicks column'], 401);
            }
            if(!array_key_exists('Amount Spent (USD)', $customerArr[0])){
                return response()->json(['error' => 'The file does not have Amount Spentcolumn'], 401);
            }
            if(count($customerArr) !== 0) {
                for ($i = 0; $i < count($customerArr); $i ++)
                {
                    $customer = $customerArr[$i];
                    if ($customer['Cost per Results'] === '') {
                        $customer['Cost per Results'] = 0;
                    }
                    if ($customer['Impressions'] === '') {
                        $customer['Impressions'] = 0;
                    }
                    if($customer['Link Clicks'] === '') {
                        $customer['Link Clicks'] = 0;
                    }
                    if($customer['Amount Spent (USD)'] === '') {
                        $customer['Link Clicks'] = 0;
                    }
                    $date_f =str_replace("/", "-", $customer['Reporting Starts']);
                    $date = Carbon::parse($date_f)->timestamp;
                    $newFormat = date('Y-m-d',$date);
        
                    $date_f2 = str_replace("/", "-", $customer['Reporting Ends']);
                    $fecha_cracion = Carbon::parse($date_f2)->timestamp;
                    $newFormat2 = date('Y-m-d',$fecha_cracion);

                    $newFormat3 = $newFormat2;

                    $informe_asset = InformeAsset::where('fecha_cracion', $newFormat2)->where('id_asset',$request['asset'])->first();
                    if($informe_asset){
                        $informe_asset->reach = $customer['Reach'];
                        $informe_asset->impressions = $customer['Impressions'];
                        $informe_asset->ammount_spent =  $customer['Amount Spent (USD)'];
                        $informe_asset->cost_per_result = $customer['Cost per Results'];
                        $informe_asset->link_clicks =  $customer['Link Clicks'];
                        $informe_asset->fecha_ultima_actualizacion = $newFormat3;
                        $informe_asset->fecha_cracion = $newFormat2;
                    }else{
                        $informe_asset = InformeAsset::create([
                            'reach' => $customer['Reach'],
                            'impressions' => $customer['Impressions'],
                            'ammount_spent' => $customer['Amount Spent (USD)'],
                            'cost_per_result' => $customer['Cost per Results'],
                            'link_clicks' => $customer['Link Clicks'],
                            'fecha_ultima_actualizacion' => $newFormat3,
                            'fecha_cracion' => $newFormat2,
                        ]);
                         
                        $informe_asset->asset()->associate($asset);
                        $informe_asset->save();
                        $asset->InformeAssets()->save($informe_asset);
                        $asset->save();
                    }  
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
