@extends('layout')
@section('titulo-pagina')
Formulário submetido
@endsection
@section('header')
Informação enviada através de form
@endsection
@section('conteudo')
	{{$nome}}<br>
	{{$morada}}<br>
	{{$geneross}}
@endsection