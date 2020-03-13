<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Campana;
use App\TipoCampana;
use Illuminate\Support\Facades\Validator;
class CampanaController extends Controller
{
    

    public function getCampanasByUser($id_user){
        $user = User::find($id_user);
        return $user->campanas->toArray();
    }

    public function getInformecampana($id_campana){
        $campana = Campana::find($id_campana);
        return $campana->informeCampanas;
    }

    public function addNewCampaign(Request $request){
        $validation_rules = [
            'nombre_campana' => 'required',
            'negocio_campana' => 'required',
            'fecha_inicio_campana' => 'required',
            'fecha_terminacion_campana' => 'required',
            'user_id' => 'required',
            'tipo_campana' => 'required',
            'expected_budget' => 'required',
            'expected_link_clicks' => 'required'
        ];
    
        $messages = [
            'nombre_campana.required' => 'The Campaign Name is required',
            'negocio_campana.required' => 'The Business Name is required',
            'fecha_inicio_campana.required' => 'The Start Date is required',
            'fecha_terminacion_campana.required' => 'The Due Date is required',
            'user_id.required' => 'The Client is required',
            'tipo_campana.required' => 'The Campaign Type is required',
            'expected_budget' => 'Expected Budget field is required',
            'expected_link_clicks' => 'Expected Link Clicks field is required'
        ];
        $validator = Validator::make($request->all(),$validation_rules, $messages);
        if($validator->passes()){
            $input = $request->all();
            $campana = Campana::create([
                'nombre_campana' => $input['nombre_campana'],
                'negocio_campana' => $input['negocio_campana'],
                'expected_budget' => $input['expected_budget'],
                'expected_link_clicks' => $input['expected_link_clicks'],
                'fecha_inicio_campana' => $input['fecha_inicio_campana'],
                'fecha_terminacion_campana' => $input['fecha_terminacion_campana']
            ]);
            $user = User::find($input['user_id']);
            $tipo_campana = TipoCampana::find($input['tipo_campana']);

            $user->campanas()->save($campana);
            $campana->User()->associate($user);

            $campana->TipoCampana()->associate($tipo_campana);
            $tipo_campana->Campanas()->save($campana);

            return response()->json("sucess", 200);
        
            //$user->save();
        // $tipo_campana->save();
        }else{
            return response()->json($validator->messages(),401);
        }

    }

    public function getAssetsByCampaign($id_campana){
        $campana = Campana::find($id_campana);
        $assets = $campana->Assets;
        return $assets;
    }

    public function deleteCampaign($id_campaign){
        $campana = Campana::find($id_campaign);
        $campana->InformeCampanas()->delete();
        $campana->Assets()->delete();
        $campana->TipoCampana()->delete();
        $campana->User()->delete();
        $campana->delete();
    }

    
}
