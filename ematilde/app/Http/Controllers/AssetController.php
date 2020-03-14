<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Campana;
class AssetController extends Controller
{
    public function addAsset(Request $request){
        $file = $request->file('file');
        $file->move('uploads', $file->getClientOriginalName());

        $date = strtotime($request['fecha_inicio_asset']);
        $newFormat = date('Y-m-d',$date);
        
        $date1 = strtotime($request['fecha_finalizacion_asset']);
        $newFormat1 = date('Y-m-d',$date1);

        $file_path = public_path().'/uploads/'.$file->getClientOriginalName();

        $campaign = Campana::find($request['id_campana']);

        $asset = Asset::create([
            'nombre_asset' => $request['nombre_asset'],
            'descripcion_asset' => $request['descripcion_asset'],
            'fecha_inicio_asset' => $newFormat,
            'fecha_finalizacion_asset' => $newFormat1,
            'archivo_asset' => $file_path
        ]);
        
        $campaign->Assets()->save($asset);
        return response()->json([
            'message' => 'A new Asset has been uploaded successfully'], 200);
        //return response()->download(public_path().'/uploads/'.$file->getClientOriginalName());
        return $campaign;
    }

    public function getAssetReport($id){
        $asset = Asset::find($id);
        return $asset->InformeAssets;
    }

    public function getAssetImage($id){
        $asset = Asset::find($id);
       //return response()->download($asset->archivo_asset);
        return $asset;
    }
}
