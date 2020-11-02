<ul>
@foreach($autores as $autor)
<li>
	<a href="{{route('autores.show', ['id'=>$autor->ida])}}">
	{{$autor->nome}}
	</a>
</li>
@endforeach
</ul>
{{$autores->render()}}