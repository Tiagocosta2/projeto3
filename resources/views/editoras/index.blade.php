<ul>
@foreach($editoras as $editora)
<li>
	<a href="{{route('editoras.show', ['id'=>$editora->ide])}}">
	{{$editora->nome}}
	</a>
</li>
@endforeach
</ul>
{{$editoras->render()}}