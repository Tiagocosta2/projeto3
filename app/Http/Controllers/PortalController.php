<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortalController extends Controller
{
    //
     public function mostrarForm() {
        return view('formulario');
    }
    public function processarForm (Request $request) {
        $nome = $request->nome;
        $morada = $request->morada;
        $geneross = $request ->geneross;

        return view('form-enviado',[   
            'nome' =>$nome,
            'morada'=>$morada,
            'geneross'=>$geneross
        ]);
    }
}
