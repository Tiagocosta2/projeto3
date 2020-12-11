<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Livro;
use App\Models\Genero;
use App\Models\Autor;
use App\Models\Editora;

class LivrosController extends Controller
{
    //

    public function index() {
    	//$livros = Livro::all()->sortbydesc('id_livro');
    	$livros = Livro::paginate(4);

    	return view('livros.index', [
    		'livros'=>$livros
    	]);
    }
    public function show (Request $request) {
    	$idLivro = $request->id;
    	//$livro = Livro::findOrFail($idLivro);
    	//$livro = Livro::find($idLivro);
    	$livro = Livro::where('id_livro',$idLivro)->with(['genero','autores','editoras','users'])->first();


    	return view ('livros.show', [
    		'livro'=>$livro
    	]);
    }
    public function create() {
        $generos = Genero::all();
        $autores = Autor::all();
        $editoras = Editora::all();
        return view('livros.create',[
            'generos'=>$generos,
            'autores'=>$autores,
            'editoras'=>$editoras
        ]);

    }
    public function store(Request $request) {
        
        //$novoLivro = $request->all();
        //dd($novoLivro);
        $novoLivro = $request->validate ([
            
            'titulo'=>['required', 'min:3', 'max:100'],
            'idioma'=>['nullable', 'min:3', 'max:20'],
            'total_paginas'=>['nullable', 'numeric', 'min:1'],
            'data_edicao'=>['nullable', 'date'],
            'isbn'=>['required', 'min:13', 'max:13'],
            'observacoes'=>['nullable', 'min:3', 'max:255'],
            'imagem_capa'=> ['nullable'],
            'id_genero' => ['numeric', 'nullable'],
            'sinopse'=>['nullable', 'min:3', 'max:255'],
        ]);
        if(Auth::check()){
            $userAtual=Auth::user()->id;
            $novoLivro['id_user']=$userAtual;
        }
        $autores=$request->id_autor;
        $editoras=$request->id_editora;
        $livro = Livro::create($novoLivro);
        $livro->autores()->attach($autores);
        $livro->editoras()->attach($editoras);
        return redirect()->route('livros.show', [
                'id'=>$livro->id_livro
         ]);

    }
    public function edit(Request $request) {
        $idLivro=$request->id;
        $generos = Genero::all();
        $autores = Autor::all();
        $editoras = Editora::all();
        $idLivro = Livro::where('id_livro', $idLivro)->with(['autores','editoras'])->first();

        $autoresLivro=[];
        foreach ($idLivro->autores as $autor) {
            $autoresLivro[] = $autor->id_autor;
        }

        $editorasLivro= [];
        foreach ($idLivro->editoras as $editora) {
            $editorasLivro[]=$editora->id_editora;
        }
        
        if (isset($idLivro->id_user)) {
            if(Auth::user()->id==$idLivro->id_user){
                 return view('livros.edit', [
            'livro'=>$idLivro,
                 'generos'=>$generos,
                 'autores'=>$autores,
                 'editoras'=>$editoras,
                 'autoresLivro'=>$autoresLivro,
                'editorasLivro'=>$editorasLivro
             ]);
            }
            else{
            return redirect()->route('livros.index')->with('mensagem', 'Erro');
            }
        } 
        // return view('livros.edit', [
        //     'livro'=>$idLivro,
        //     'generos'=>$generos,
        //     'autores'=>$autores,
        //     'editoras'=>$editoras,
        //     'autoresLivro'=>$autoresLivro,
        //     'editorasLivro'=>$editorasLivro
        // ]);
       
        
    }
    public function update (Request $request) {
        $idLivro=$request->id;
        $livro = Livro::findOrFail($idLivro);
            $atualizarLivro = $request->validate ([
            'titulo'=>['required', 'min:3', 'max:100'],
            'idioma'=>['nullable', 'min:3', 'max:20'],
            'total_paginas'=>['nullable', 'numeric', 'min:1'],
            'data_edicao'=>['nullable', 'date'],
            'isbn'=>['required', 'min:13', 'max:13'],
            'observacoes'=>['nullable', 'min:3', 'max:255'],
            'imagem_capa'=> ['nullable'],
            'id_genero' => ['numeric', 'nullable'],
            'sinopse'=>['nullable', 'min:3', 'max:255'],
            ]); 
            $editoras=$request->id_editora;
            $autores=$request->id_autor;
            $livro->update($atualizarLivro);  
            $livro->autores()->sync($autores); 
            $livro->editoras()->sync($editoras);
        return redirect()->route('livros.show', [
            'id'=>$livro->id_livro
        ]); 
    }
    public function delete(Request $request) {
        $idLivro=$request->id;
        $livro=Livro::where('id_livro', $idLivro )->first();
        if(is_null($livro)) {
            return redirect()->route('livros.index')
            ->with('mensagem','Livro não existe!');
        }
        else {
            return view('livros.delete', ['livro'=>$livro]);
        }
    }
    public function destroy(Request $request) {
        $idLivro=$request->id;
        $livro =Livro::findOrFail($idLivro);

        $autoresLivro=Livro::findOrFail($idLivro)->autores;
        $editorasLivro=Livro::findOrFail($idLivro)->editoras;
        $livro->autores()->detach($autoresLivro);
        $livro->editoras()->detach($editorasLivro);
        $livro->delete();
        return redirect()->route('livros.index')
        ->with('mensagem', 'Livro Eliminado');
    }

}
