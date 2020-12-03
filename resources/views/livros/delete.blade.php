
<h2>Deseja eleminar o livro</h2> 
<h2>{{$livro->titulo}}</h2>
<form action="{{route('livros.destroy', ['id'=>$livro->id_livro])}}" method="post">
	@csrf
	@method('delete')

	<input type="submit" name="enviar">
</form>