<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;
use App\Models\Livro;
use App\Models\Genero;
use App\Models\Autor;
use App\Models\Editora;
use App\Models\Like;

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

        $likes = Like::where('id_livro', $idLivro)->count();

    	$livro = Livro::where('id_livro',$idLivro)->with(['genero','autores','editoras','users'])->first();


    	return view ('livros.show', [
    		'livro'=>$livro,
            'likes'=>$likes
    	]);
    }
    public function create() {
        if (Gate::allows('admin')) {
            $generos = Genero::all();
            $autores = Autor::all();
            $editoras = Editora::all();
            return view('livros.create',[
            'generos'=>$generos,
            'autores'=>$autores,
            'editoras'=>$editoras
        ]);
        }
        else{
             return redirect()->route('livros.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
        }
    }
    public function store(Request $request) {
      if (Gate::allows('admin')) {
        //$novoLivro = $request->all();
        //dd($novoLivro);
        $novoLivro = $request->validate ([
            
            'titulo'=>['required', 'min:3', 'max:100'],
            'idioma'=>['nullable', 'min:3', 'max:20'],
            'total_paginas'=>['nullable', 'numeric', 'min:1'],
            'data_edicao'=>['nullable', 'date'],
            'isbn'=>['required', 'min:13', 'max:13'],
            'observacoes'=>['nullable', 'min:3', 'max:255'],
            'imagem_capa'=> ['image','nullable','max:2000'],
            'id_genero' => ['numeric', 'nullable'],
            'sinopse'=>['nullable', 'min:3', 'max:255'],
        ]);
        if($request->hasFile('imagem_capa')){
            $nomeImagem=$request->file('imagem_capa')->getClientOriginalName();

            $nomeImagem=time().'_'.$nomeImagem;
            $guardarImagem=$request->file('imagem_capa')->storeAs('imagens/livros',$nomeImagem);

            $novoLivro['imagem_capa']=$nomeImagem;
        }
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
      else {
        return redirect()->route('livros.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
      }  
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
            if (Gate::allows('atualizar-livro', $idLivro)|| Gate::allows('admin')) {
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
        if(Gate::allows('admin')){
        $idLivro=$request->id;
        $livro = Livro::findOrFail($idLivro);
            $atualizarLivro = $request->validate ([
            'titulo'=>['required', 'min:3', 'max:100'],
            'idioma'=>['nullable', 'min:3', 'max:20'],
            'total_paginas'=>['nullable', 'numeric', 'min:1'],
            'data_edicao'=>['nullable', 'date'],
            'isbn'=>['required', 'min:13', 'max:13'],
            'observacoes'=>['nullable', 'min:3', 'max:255'],
            'imagem_capa'=> ['image','nullable','max:2000'],
            'id_genero' => ['numeric', 'nullable'],
            'sinopse'=>['nullable', 'min:3', 'max:255'],
            ]);
            if($request->hasFile('imagem_capa')){
            $nomeImagem=$request->file('imagem_capa')->getClientOriginalName();

            $nomeImagem=time().'_'.$nomeImagem;
            $guardarImagem=$request->file('imagem_capa')->storeAs('imagens/livros',$nomeImagem);

            $atualizarLivro['imagem_capa']=$nomeImagem;
        } 
            $editoras=$request->id_editora;
            $autores=$request->id_autor;
            $livro->update($atualizarLivro);  
            $livro->autores()->sync($autores); 
            $livro->editoras()->sync($editoras);
        return redirect()->route('livros.show', [
            'id'=>$livro->id_livro
        ]);
       }
       else {
        return redirect()->route('livros.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
       }  
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
      if(Gate::allows('admin')) {
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
      else {
        return redirect()->route('livros.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
      }  
    }
    public function sendlikes(Request $request) {
        $idLivro=$request->id;
        $novoLike['id_livro']=$idLivro;
        $novoLike['id_user']= Auth::user()->id;  
        $likes=Like::where('id_user', Auth::user()->id)->where('id_livro', $idLivro)->first();
        
        if(!is_null($likes)) {

        }
        else{
            Like::create($novoLike);
        }  
        
        return redirect()->route('livros.show', ['id'=>$idLivro]);
    }

}
