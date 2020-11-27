<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutoresController extends Controller
{
    //
    public function index() {
    	//$autores = Autor::all()->sortbydesc('id_autor');
    	$autores = Autor::paginate(4);

    	return view('autores.index', [
    		'autores'=>$autores
    	]);
    }
    public function show (Request $request) {
    	$idAutor = $request->id;
    	//$autor = Autor::findOrFail($idAutor);
    	//$autor = Autor::find($idAutor);
    	$autor = Autor::where('id_autor',$idAutor)->with('livros')->first();
    
    	return view ('autores.show', [
    		'autor'=>$autor
    	]);
    }
    public function create() {
        return view('autores.create');
    }
    public function store(Request $request){
        $novoAutor = $request->validate([
            'nome'=>['required', 'min:1', 'max:50'],
            'nacionalidade'=> ['nullable','min:3', 'max:50'],
            'data_nascimento'=>['nullable', 'date'],
            'fotografia'=>['nullable'],
        ]);
        $autor =Autor::create($novoAutor);
        return redirect()->route('autores.show', [
                'id'=>$autor->id_autor
            ]);
    }
    public function edit(Request $request) {
        $idAutor=$request->id;
        $idAutor = Autor::where('id_autor', $idAutor)->first();
        return view('autores.edit', [
            'autor'=>$idAutor
        ]);
    }
    public function update (Request $request) {
        $idAutor=$request->id;
        $autor = Autor::findOrFail($idAutor);
            $atualizarAutor = $request->validate ([
            'nome'=>['required', 'min:1', 'max:50'],
            'nacionalidade'=> ['nullable','min:3', 'max:50'],
            'data_nascimento'=>['nullable', 'date'],
            'fotografia'=>['nullable'],
            ]); 
        $autor->update($atualizarAutor);   
        return redirect()->route('autores.show', [
            'id'=>$autor->id_autor
        ]); 
    }

}
