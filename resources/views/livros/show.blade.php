ID:{{$livro->id_livro}}<br>
Título:{{$livro->titulo}}<br>
Idioma:{{$livro->idioma}}<br>


@if(isset($livro->genero->designacao)) 
Designação:	{{$livro->genero->designacao}}<br>
@else
	Sem genero definido	<br>
@endif

@if(isset($livro->autor->nome))
Nome: {{$livro->autor->nome}}
@else
	Sem autor defenido
@endif


