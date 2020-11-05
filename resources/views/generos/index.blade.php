<ul>
@foreach($generos as $genero)
<li>
	<a href="{{route('generos.show', ['id'=>$genero->id_genero])}}">
	{{$genero->designacao}}
	</a>
</li>
@endforeach
</ul>
{{$generos->render()}}