<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoCliente;

class TipoClienteController extends Controller
{
    public function getTipoClientes()
    {
        return TipoCliente::all();
    }

    

}
