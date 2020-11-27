<form action="{{route('editoras.update', ['id'=>$editora->id_editora])}}" method="post">
@csrf
@method('patch')
Nome: <input type="text" name="nome" value="{{$editora->nome}}"><br>
@if ( $errors->has('nome') )
Deverá indicar um nome correto <br>
@endif

Morada: <input type="text" name="morada" value="{{$editora->morada}}"><br>
@if ( $errors->has('morada') )
Deverá indicar uma morada correta <br>
@endif

Observações: <textarea name="observacoes">{{$editora->observacoes}}</textarea><br>
@if ( $errors->has('observacoes') )
Deverá indicar uma observação correta<br>
@endif

	<input type="submit" value="enviar">
</form>