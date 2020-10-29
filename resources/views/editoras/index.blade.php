<ul>
@foreach($editoras as $editora)
<li>{{$editora->nome}}</li>
@endforeach
</ul>
{{$editoras->render()}}