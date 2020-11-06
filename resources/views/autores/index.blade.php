@extends('layout')
@section('conteudo')
<ul>
@foreach($autores as $autor)
<li>
	<a href="{{route('autores.show', ['id'=>$autor->id_autor])}}">
	{{$autor->nome}}
	</a>
</li>
@endforeach
</ul>
{{$autores->render()}}

@endsection