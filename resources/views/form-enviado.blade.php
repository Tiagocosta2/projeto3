@extends('layout')
@section('titulo-pagina')
Formulário submetido
@endsection
@section('header')
Informação enviada através de form
@endsection
@section('conteudo')
	{{$nome}}<br>
@foreach($autor as $at)
	{{$at->nome}}<br>
@endforeach	

@endsection