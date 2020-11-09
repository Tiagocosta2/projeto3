@extends('layout')
@section('conteudo')
<form method="post" action="{{route('processar.form')}}">
		@csrf
	<label for="nome">Nome</label>
	<input type="text" name="nome">

	<button type="submit">enviar</button>
	</form>
@endsection