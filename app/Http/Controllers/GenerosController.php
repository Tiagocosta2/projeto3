<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;

class GenerosController extends Controller
{
    //
    public function index() {
    	//$generos = Genero::all()->sortbydesc('id_genero');
    	$generos = Genero::paginate(4);

    	return view('generos.index', [
    		'generos'=>$generos
    	]);
    }
    public function show (Request $request) {
    	$idGenero = $request->id;
    	//$genero = Genero::findOrFail($idGenero);
    	//$genero = Genero::find($idGenero);
    	$genero = Genero::where('id_genero',$idGenero)->with('livros')->first();

    	return view ('generos.show', [
    		'genero'=>$genero
    	]);
    }
    public function create() {
        return view('generos.create');
    }
    public function store(Request $request){
        $novoGenero = $request->validate([
            'designacao'=>['required', 'min:1', 'max:50'],
            'observacoes'=> ['nullable','min:3', 'max:200'],
        ]);
        $genero =Genero::create($novoGenero);
        return redirect()->route('generos.show', [
            'id'=>$genero->id_genero
        ]);
    }
    public function edit(Request $request) {
        $idGenero=$request->id;
        $idGenero = Genero::where('id_genero', $idGenero)->first();
        return view('generos.edit', [
            'genero'=>$idGenero
        ]);
    }
    public function update (Request $request) {
        $idGenero=$request->id;
        $genero = Genero::findOrFail($idGenero);
            $atualizarGenero = $request->validate ([
            'designacao'=>['required', 'min:1', 'max:50'],
            'observacoes'=> ['nullable','min:3', 'max:200'],   
            ]); 
        $genero->update($atualizarGenero);   
        return redirect()->route('generos.show', [
            'id'=>$genero->id_genero
        ]); 
    }
}
