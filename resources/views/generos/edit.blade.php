<form action="{{route('generos.update', ['id'=>$genero->id_genero])}}" method="post">
@csrf
@method('patch')
Designação: <input type="text" name="designacao" value="{{$genero->designacao}}"><br>
@if ( $errors->has('designacao') )
Deverá indicar uma desinação correta <br>
@endif

Observações: <textarea name="observacoes">{{$genero->observacoes}}</textarea><br>
@if ( $errors->has('observacoes') )
Deverá indicar uma observação correta<br>
@endif
<input type="submit" value="enviar">
</form>