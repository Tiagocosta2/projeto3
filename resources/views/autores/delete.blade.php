<h2>Deseja eleminar o autor</h2> 
<h2>{{$autor->nome}}</h2>
<form action="{{route('autores.destroy', ['id'=>$autor->id_autor])}}" method="post">
	@csrf
	@method('delete')

	<input type="submit" name="enviar">
</form>