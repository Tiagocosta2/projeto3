@extends('layout')
@section('conteudo')
ID:{{$editora->id_editora}}<br>
Nome:{{$editora->nome}}<br>
Morada:{{$editora->morada}}<br>

Livro:
@foreach($editora->livros as $editora)
{{$editora->titulo}} <br>
@endforeach
<br>
<button type="button" class="btn btn-outline-primary"><a href="{{route('editoras.create')}}">Adicionar editoras</a></button><br>
<button type="button" class="btn btn-outline-primary"><a href="{{route('editoras.edit', ['id'=>$editora->id_editora])}}">Editar</a></button>
<button type="button" class="btn btn-outline-primary"><a href="{{route('editoras.delete', ['id'=>$editora->id_editora])}}">Eliminar</a></button>
@endsection