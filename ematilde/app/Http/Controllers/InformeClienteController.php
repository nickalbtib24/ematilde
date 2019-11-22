<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\InformeCliente;
class InformeClienteController extends Controller
{
    public function getKpi($userId){

        $user = User::find($userId);
        $informe_cliente = $user->informeClientes;
        return response()->json($informe_cliente);
    }
}
