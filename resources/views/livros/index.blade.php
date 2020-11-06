@extends('layout')
@section('conteudo')
<ul>
@foreach($livros as $livro)
<li>
	<a href="{{route('livros.show', ['id'=>$livro->id_livro])}}">
	{{$livro->titulo}}
	</a>
</li>
@endforeach
</ul>
{{$livros->render()}}

@endsection