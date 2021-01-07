<form action="{{route('livros.store')}}" enctype="multipart/form-data" method="post">
@csrf

Titulo: <input type="text" name="titulo" value="{{old('titulo')}}"><br>
@if ( $errors->has('titulo') )
Deverá indicar um titulo correto <br>
@endif

idioma: <input type="text" name="idioma" value="{{old('idioma')}}"><br>
@if ( $errors->has('idioma') )
Deverá indicar um idioma correto<br>
@endif

Total páginas: <input type="text" name="total_paginas" value="{{old('total_paginas')}}"><br>
@if ( $errors->has('total_paginas') )
Deverá indicar um total de paginas correto<br>
@endif

Data Edição: <input type="date" name="data_edicao" value="{{old('data_edicao')}}"><br>
@if ( $errors->has('data_edicao') )
Deverá indicar uma data de edição correta<br>
@endif

ISBN: <input type="text" name="isbn" value="{{old('isbn')}}"><br>
@if ( $errors->has('isbn') )
Deverá indicar um ISBN correto(13 caracteres)<br>
@endif

Observações: <textarea name="observacoes"></textarea><br>
@if ( $errors->has('observacoes') )
Deverá indicar uma observação correta<br>
@endif

Imagem capa: <input type="file" name="imagem_capa" value="{{old('imagem_capa')}}"><br>
@if ( $errors->has('imagem_capa') )
Deverá indicar uma imagem de capa correta<br>
@endif

Género: 
<select name="id_genero">
	@foreach($generos as $genero)
		<option value="{{$genero->id_genero}}">{{$genero->designacao}}</option>
	@endforeach
	@if ( $errors->has('id_genero') )
		Deverá indicar um Id genero correto<br>
	@endif
</select>

<br>

Autor(es):
 <select name="id_autor[]" multiple="multiple">
 	@foreach($autores as $autor )
 		<option value="{{$autor->id_autor}}">{{$autor->nome}}</option>
 	@endforeach
 </select>
@if ( $errors->has('id_autor') )
Deverá indicar um Id autor correto<br>
@endif

Sinpose: <textarea name="sinopse"></textarea><br>
@if ( $errors->has('sinopse') )
Deverá indicar umaa Sinopse correta<br>
@endif
<br>
<br>

Editora:
<select name="id_editora[]" multiple="multiple">
	@foreach($editoras as $editora)
		<option value="{{$editora->id_editora}}">
			{{$editora->nome}}
		</option>
	@endforeach
</select>
<input type="submit" value="enviar">

</form>