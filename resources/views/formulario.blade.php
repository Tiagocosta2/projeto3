@extends('layout')
@section('conteudo')
<form method="post" action="{{route('processar.form')}}">
		@csrf
	<label for="nome">Nome</label>
	<input type="text" name="nome">
	<label for="morada">morada</label>
	<input type="text" name="morada">	
	<label for="geneross">Genero</label>
	<select name="geneross">
		<option value="masculino">Masculino</option>
		<option value="femininio">Feminino</option>
	</select>	
	<button type="submit">enviar</button>
	</form>
@endsection