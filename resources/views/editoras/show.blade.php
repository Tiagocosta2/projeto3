ID:{{$editora->id_editora}}<br>
Nome:{{$editora->nome}}<br>
Morada:{{$editora->morada}}<br>

Livro:
@foreach($editora->livros as $editora)
{{$editora->titulo}} <br>
@endforeach