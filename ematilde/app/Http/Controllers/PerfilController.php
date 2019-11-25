<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\User;
class PerfilController extends Controller
{
    public function getClients(){
        $perfilCliente = Perfil::find(2);
        return $perfilCliente->users;
    }
}
