<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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
        if (Gate::allows('admin')) {
            return view('autores.create');
        }
        else{
            return redirect()->route('autores.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
        }
    }
    public function store(Request $request){
        if (Gate::allows('admin')) {
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
        else{
            return redirect()->route('autores.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
        }

    }
    public function edit(Request $request) {
        if(Gate::allows('admin')) {
        $idAutor=$request->id;
        $idAutor = Autor::where('id_autor', $idAutor)->first();
        return view('autores.edit', [
            'autor'=>$idAutor
        ]); 
        }
        else{
            return redirect()->route('autores.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
        }
    }
    public function update (Request $request) {
        if(Gate::allows('admin')){
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
        else{
            return redirect()->route('autores.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
        }
    }
    public function delete(Request $request) {
        if(Gate::allows('admin')) {
            $idAutor=$request->id;
        $autor=Autor::where('id_autor', $idAutor )->first();
        if(is_null($autor)) {
            return redirect()->route('autores.index')
            ->with('mensagem','Autor não existe!');
        }
        else {
            return view('autores.delete', ['autor'=>$autor]);
        }
        }
        else{
            return redirect()->route('autores.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
        }
        
    }
    public function destroy(Request $request) {
        if(Gate::allows('admin')) {
            $idAutor=$request->id;
            $autor =Autor::findOrFail($idAutor);
            $autor->delete();
            return redirect()->route('autores.index')
            ->with('mensagem', 'Autor Eliminado');
        }
        else {
            return redirect()->route('autores.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
        }     
    }

}
