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
<button type="button" class="btn btn-outline-primary"><a href="{{route('livros.create')}}">Adicionar livros</a></button><br>
<button type="button" class="btn btn-outline-primary"><a href="{{route('livros.edit', ['id'=>$livro->id_livro])}}">Editar</a></button>
@endsection


