<form action="{{route('autores.store')}}" method="post">
@csrf
Nome: <input type="text" name="nome" value="{{old('nome')}}"><br>
@if ( $errors->has('nome') )
Deverá indicar um nome correto <br>
@endif

Nacionalidade: <input type="text" name="nacionalidade" value="{{old('nacionalidade')}}"><br>
@if ( $errors->has('nacionalidade') )
Deverá indicar uma nacionalidade correta <br>
@endif

Data de nascimento:<input type="date" name="data_nascimento" value="{{old('data_nascimento')}}"><br>
@if ( $errors->has('data_nascimento') )
Deverá indicar uma data de nascimento correta  <br>
@endif

Fotografia:	<input type="text" name="fotografia" value="{{old('fotografia')}}"><br>
@if ( $errors->has('fotografia') )
Deverá indicar uma fotografia correta <br>
@endif
	<input type="submit" value="enviar">
</form>