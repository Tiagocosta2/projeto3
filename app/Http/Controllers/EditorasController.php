<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editora;

class EditorasController extends Controller
{
    //
     public function index() {
    	//$editoras = Editora::all()->sortbydesc('id_editora');
    	$editoras = Editora::paginate(4);

    	return view('editoras.index', [
    		'editoras'=>$editoras
    	]);
    }
    public function show (Request $request) {
    	$idEditora = $request->id;
    	//$editora = Editora::findOrFail($idEditora);
    	//$editora = Editora::find($idEditora);
    	$editora = Editora::where('id_editora',$idEditora)->with('livros')->first();

    	return view ('editoras.show', [
    		'editora'=>$editora
    	]);
    }
    public function create() {
        return view('editoras.create');
    }
    public function store(Request $request){
        $novoEditora = $request->validate([
            'nome'=>['required', 'min:1', 'max:50'],
            'morada'=> ['nullable','min:3', 'max:50'],
            'observacoes'=> ['nullable','min:3', 'max:200'],
        ]);
        $editora =Editora::create($novoEditora);
        return redirect()->route('editoras.show', [
                'id'=>$editora->id_editora
            ]);

    }
}
