@extends('layout')
@section('conteudo')
ID:{{$livro->id_livro}}<br>
Título:{{$livro->titulo}}<br>
Idioma:{{$livro->idioma}}<br>


@if(isset($livro->genero->designacao)) 
Designação:	{{$livro->genero->designacao}}<br>
@else
	Sem genero definido	<br>
@endif

{{--if(isset($livro->autor->nome))
Nome: {{$livro->autor->nome}}
@else
	Sem autor defenido
endif--}}

Nome:<br>
@foreach($livro->autores as $autor)
{{$autor->nome}} <br>
@endforeach

Edição:<br>
@foreach($livro->editoras as $editora)
{{$editora->nome}} <br>
@endforeach

Imagem Capa:<br>
@if(isset($livro->imagem_capa))
<img src="{{asset('imagens/livros/'.$livro->imagem_capa)}}">
@endif
 <br>
<br>
Excertos:
@if(isset($livro->excerto))
<a href="" target="_blank">PDF</a>
@endif
<br>
<br>



@if(!is_null($livro->users))
User: {{$livro->users->name}}
@else
	Sem user defenido 
@endif
<br>
<a href="{{route('livros.like', ['id'=>$livro->id_livro])}}" class="btn btn-outline-primary">Likes</a>{{$likes}}
<br>
@if(auth()->check())
<button type="button" class="btn btn-outline-primary"><a href="{{route('livros.create')}}">Adicionar livros</a></button><br>
@if(Auth::user()->id==$livro->id_user)
<button type="button" class="btn btn-outline-primary"><a href="{{route('livros.edit', ['id'=>$livro->id_livro])}}">Editar</a></button>
<button type="button" class="btn btn-outline-primary"><a href="{{route('livros.delete', ['id'=>$livro->id_livro])}}">Eliminar</a></button>
@else
Não tem permissoes para editar e eleminar
@endif

@endif
@endsection


