<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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
        if (Gate::allows('admin')) {
           return view('editoras.create'); 
        }
        else{
            return redirect()->route('editoras.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
        }
    }
    public function store(Request $request){
        if (Gate::allows('admin')) {
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
        else{
            return redirect()->route('editoras.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
        } 
    }
    public function edit(Request $request) {
        if (Gate::allows('admin')) {
            $idEditora=$request->id;
        $idEditora = Editora::where('id_editora', $idEditora)->first();
        return view('editoras.edit', [
            'editora'=>$idEditora
        ]);
        }
        else{
            return redirect()->route('editoras.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
        }
        
    }
    public function update (Request $request) {
        if (Gate::allows('admin')) {
             $idEditora=$request->id;
        $editora = Editora::findOrFail($idEditora);
            $atualizarEditora = $request->validate ([
            'nome'=>['required', 'min:1', 'max:50'],
            'morada'=> ['nullable','min:3', 'max:50'],
            'observacoes'=> ['nullable','min:3', 'max:200'],   
            ]); 
        $editora->update($atualizarEditora);   
        return redirect()->route('editoras.show', [
            'id'=>$editora->id_editora
        ]); 
        }
        else{
            return redirect()->route('editoras.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
        }
    }
    public function delete(Request $request) {
        if (Gate::allows('admin')) {
             $idEditora=$request->id;
        $editora=Editora::where('id_editora', $idEditora )->first();
        if(is_null($editora)) {
            return redirect()->route('editoras.index')
            ->with('mensagem','Editora não existe!');
        }
        else {
            return view('editoras.delete', ['editora'=>$editora]);
        }
        }
        else{
            return redirect()->route('editoras.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
        }
       
    }
    public function destroy(Request $request) {
        if (Gate::allows('admin')) {
            $idEditora=$request->id;
            $editora =Editora::findOrFail($idEditora);
            $editora->delete();
            return redirect()->route('editoras.index')
            ->with('mensagem', 'Editora Eliminada');
        }
        else{
            return redirect()->route('editoras.index')->with('mensagem', 'Erro não tem permissoes para entrar nesta area');
        }
        
    }
}
