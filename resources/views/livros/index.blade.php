<ul>
@foreach($livros as $livro)
<li>{{$livro->titulo}}</li>
@endforeach
</ul>
{{$livros->render()}}