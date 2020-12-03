
<h2>Deseja eleminar o genero</h2> 
<h2>{{$genero->nome}}</h2>
<form action="{{route('generos.destroy', ['id'=>$genero->id_genero])}}" method="post">
	@csrf
	@method('delete')

	<input type="submit" name="enviar">
</form>