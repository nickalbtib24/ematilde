<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Campana;
use App\TipoCampana;
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
        $input = $request->all();
        $campana = Campana::create([
            'nombre_campana' => $input['nombre_campana'],
            'negocio_campana' => $input['negocio_campana'],
            'fecha_inicio_campana' => $input['fecha_inicio_campana'],
            'fecha_terminacion_campana' => $input['fecha_terminacion_campana']
        ]);
        $user = User::find($input['user_id']);
        $tipo_campana = TipoCampana::find($input['tipo_campana']);

        $campana->TipoCampana()->associate($tipo_campana);
        $tipo_campana->Campanas()->save($campana);

        //$campana->User()->associate($user);
        $user->campanas()->save($campana);

        $campana->save();
        //$user->save();
       // $tipo_campana->save();

    }

    

    
}
