<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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
        if (Gate::allows('admin')) {
            return view('generos.create');
        }
        else{
            return redirect()->route('generos.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
        }
    }
    public function store(Request $request){
        if (Gate::allows('admin')) {
            $novoGenero = $request->validate([
            'designacao'=>['required', 'min:1', 'max:50'],
            'observacoes'=> ['nullable','min:3', 'max:200'],
        ]);
        $genero =Genero::create($novoGenero);
        return redirect()->route('generos.show', [
            'id'=>$genero->id_genero
        ]);
        }
        else{
            return redirect()->route('generos.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
        }
        
    }
    public function edit(Request $request) {
        if(Gate::allows('admin')) {
            $idGenero=$request->id;
        $idGenero = Genero::where('id_genero', $idGenero)->first();
        return view('generos.edit', [
            'genero'=>$idGenero
        ]);
        }
        else{
            return redirect()->route('generos.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
        }  
    }
    public function update (Request $request) {
        if (Gate::allows('admin')) {
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
        else{
            return redirect()->route('generos.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
        }
         
    }
    public function delete(Request $request) {
        if (Gate::allows('admin')) {
           $idGenero=$request->id;
        $genero=Genero::where('id_genero', $idGenero )->first();
        if(is_null($genero)) {
            return redirect()->route('generos.index')
            ->with('mensagem','Genero não existe!');
        }
        else {
            return view('generos.delete', ['genero'=>$genero]);
        } 
        }
        else{
            return redirect()->route('generos.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
        }
        
    }
    public function destroy(Request $request) {
        if(Gate::allows('admin')) {
            $idGenero=$request->id;
            $genero =Genero::findOrFail($idGenero);
            $genero->delete();
            return redirect()->route('generos.index')
            ->with('mensagem', 'Genero Eliminado');
        }
        else{
            return redirect()->route('generos.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
        }
        
    }
}
