<h2>Deseja eleminar a editora</h2> 
<h2>{{$editora->nome}}</h2>
<form action="{{route('editoras.destroy', ['id'=>$editora->id_editora])}}" method="post">
	@csrf
	@method('delete')

	<input type="submit" name="enviar">
</form>