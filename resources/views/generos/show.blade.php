@extends('layout')
@section('conteudo')
ID:{{$genero->id_genero}}<br>
Nome:{{$genero->designacao}}<br>
Observações:{{$genero->observacoes}} <br>

@if(count($genero->livros))
	@foreach($genero->livros as $livro)
	<h3>{{$livro->titulo}}</h3>
	@endforeach
@else
	Neste genero ainda não há livros! <br>
@endif	
<button type="button" class="btn btn-outline-primary"><a  href="{{route('generos.create')}}">Adicionar generos</a></button><br>
<button type="button" class="btn btn-outline-primary"><a href="{{route('generos.edit', ['id'=>$genero->id_genero])}}">Editar</a></button>

<button type="button" class="btn btn-outline-primary"><a href="{{route('generos.delete', ['id'=>$genero->id_genero])}}">Eliminar</a></button>
@endsection