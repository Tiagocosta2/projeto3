<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class PortalController extends Controller
{
    //
     public function mostrarForm() {
        return view('formulario');
    }
    public function processarForm (Request $request) {
        $nome = $request->nome;
        $autor = Autor::where('nome', 'like', '%'. $nome . '%')->paginate(4);


        return view('form-enviado',[   
            'nome' =>$nome,
            'autor'=>$autor

        ]);
    }
}
