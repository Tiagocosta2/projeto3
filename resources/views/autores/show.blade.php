ID:{{$autor->id_autor}}<br>
Nome:{{$autor->nome}}<br>
Nacionalidade:{{$autor->nacionalidade}}<br>
Data:{{$autor->data}}<br>

{{--if(count($autor->livros))
Titulo:
	@foreach($autor->livros as $livro)
<h3>{{$livro->titulo}}</h3>
	@endforeach
else
	Neste genero ainda não há livros! <br>
endif--}}	

Titulo:
@foreach($autor->livros as $livro)
{{$livro->titulo}} <br>
@endforeach
<a href="{{route('autores.create')}}">Adicionar autores</a><br>
<a href="{{route('autores.edit', ['id'=>$autor->id_autor])}}">Editar</a>
