<form action="{{route('generos.store')}}" method="post">
@csrf
Designação: <input type="text" name="designacao" value="{{old('designacao')}}"><br>
@if ( $errors->has('designacao') )
Deverá indicar uma desinação correta <br>
@endif

Observações: <textarea name="observacoes"></textarea><br>
@if ( $errors->has('observacoes') )
Deverá indicar uma observação correta<br>
@endif
<input type="submit" value="enviar">
</form>