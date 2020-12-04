<form action="{{route('livros.update', ['id'=>$livro->id_livro])}}" method="post">
@csrf
@method('patch')

Titulo: <input type="text" name="titulo" value="{{$livro->titulo}}"><br>
@if ( $errors->has('titulo') )
Deverá indicar um titulo correto <br>
@endif

idioma: <input type="text" name="idioma" value="{{$livro->idioma}}"><br>
@if ( $errors->has('idioma') )
Deverá indicar um idioma correto<br>
@endif

Total páginas: <input type="text" name="total_paginas" value="{{$livro->total_paginas}}"><br>
@if ( $errors->has('total_paginas') )
Deverá indicar um total de paginas correto<br>
@endif

Data Edição: <input type="date" name="data_edicao" value="{{$livro->data_edicao}}"><br>
@if ( $errors->has('data_edicao') )
Deverá indicar uma data de edição correta<br>
@endif

ISBN: <input type="text" name="isbn" value="{{$livro->isbn}}"><br>
@if ( $errors->has('isbn') )
Deverá indicar um ISBN correto(13 caracteres)<br>
@endif

Observações: <textarea name="observacoes">{{$livro->observacoes}}</textarea><br>
@if ( $errors->has('observacoes') )
Deverá indicar uma observação correta<br>
@endif

Imagem capa: <input type="text" name="imagem_capa" value="{{$livro->imagem_capa}}"><br>
@if ( $errors->has('imagem_capa') )
Deverá indicar uma imagem de capa correta<br>
@endif

Género:
<select name="id_genero">
	@foreach($generos as $genero)
		<option value="{{$genero->id_genero}}"
			@if($genero->id_genero==$livro->id_genero)selected @endif
			>{{$genero->designacao}}</option>
	@endforeach
@if ( $errors->has('id_genero') )
Deverá indicar um Id genero correto<br>
@endif
</select>

Autor:
<select name="id_autor[]" multiple="multiple">
 	@foreach($autores as $autor )
 		<option 
 		value="{{$autor->id_autor}}"
 		@if(in_array($autor->id_autor, $autoresLivro)) selected @endif
 		>
 		{{$autor->nome}}
 	</option>
 	@endforeach
 </select>
@if ( $errors->has('id_autor') )
Deverá indicar um Id autor correto<br>
@endif

Sinpose: <textarea name="sinopse">{{$livro->sinopse}}</textarea><br>
@if ( $errors->has('sinopse') )
Deverá indicar umaa Sinopse correta<br>
@endif
<br>
<br>

Editora:
<select name="id_editora[]" multiple="multiple">
	@foreach($editoras as $editora)
	<option value="{{$editora->id_editora}}" @if(in_array($editora->id_editora, $editorasLivro))selected @endif>
		{{$editora->nome}}
	</option>
	@endforeach
</select>


<input type="submit" value="enviar">

</form>