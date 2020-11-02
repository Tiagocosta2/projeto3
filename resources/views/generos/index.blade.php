<ul>
@foreach($generos as $genero)
<li>
	<a href="{{route('generos.show', ['id'=>$genero->idg])}}">
	{{$genero->designacao}}
	</a>
</li>
@endforeach
</ul>
{{$generos->render()}}