ID:{{$genero->id_genero}}<br>
Nome:{{$genero->designacao}}<br>
Observações:{{$genero->observacoes}} <br>

@if(count($genero->livros))
	@foreach($genero->livros as $livro)
	<h3>{{$livro->titulo}}</h3>
	@endforeach
@else
	Neste genero ainda não há livros!
@endif	