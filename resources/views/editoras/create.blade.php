<form action="{{route('editoras.store')}}" method="post">
@csrf
Nome: <input type="text" name="nome" value="{{old('nome')}}"><br>
@if ( $errors->has('nome') )
Deverá indicar um nome correto <br>
@endif

Morada: <input type="text" name="morada" value="{{old('morada')}}"><br>
@if ( $errors->has('morada') )
Deverá indicar uma morada correta <br>
@endif

Observações: <textarea name="observacoes"></textarea><br>
@if ( $errors->has('observacoes') )
Deverá indicar uma observação correta<br>
@endif

	<input type="submit" value="enviar">
</form>