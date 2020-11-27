ID:{{$editora->id_editora}}<br>
Nome:{{$editora->nome}}<br>
Morada:{{$editora->morada}}<br>

Livro:
@foreach($editora->livros as $editora)
{{$editora->titulo}} <br>
@endforeach
<br>
<a  href="{{route('editoras.create')}}">Adicionar editoras</a><br>
<a href="{{route('editoras.edit', ['id'=>$editora->id_editora])}}">Editar</a>