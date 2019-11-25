<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Campana;
class CampanaController extends Controller
{
    public function getCampanasByUser($id_user){
        $user = User::find($id_user);
        return $user->campanas;
    }

    public function getInformecampana($id_campana){
        $campana = Campana::find($id_campana);
        return $campana->informeCampanas;
    }

    
}
