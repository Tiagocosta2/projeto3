<ul>
@foreach($generos as $genero)
<li>{{$genero->designacao}}</li>
@endforeach
</ul>
{{$generos->render()}}