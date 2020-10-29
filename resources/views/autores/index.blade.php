<ul>
@foreach($autores as $autor)
<li>{{$autor->nome}}</li>
@endforeach
</ul>
{{$autores->render()}}