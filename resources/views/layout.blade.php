<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>@yield('titulo-pagina')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">

    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
    <script src="{{asset('js/slick.js')}}"></script>
</head>
<body>
      @if(session()->has('mensagem'))
  <div class="alert alert-danger" role="alert">
    {{session('mensagem')}}
    </div>
    @endif
     @yield('conteudo')
    <h1 style="color: #00ff00;">@yield('header')</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="{{route('livros.index')}}">Livros</a>
      <a class="nav-item nav-link" href="{{route('generos.index')}}">Generos</a>
      <a class="nav-item nav-link" href="{{route('editoras.index')}}">Editoras</a>
      <a class="nav-item nav-link" href="{{route('autores.index')}}">Autores</a>
      <a class="nav-item nav-link" href="{{route('mostrar.form')}}">Formulario</a>
      <a class="dropdown-item" href="{{ route('logout') }}"
         onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
       Logout
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
       @csrf
      </form>
    </div>
  </div>      
</nav>
@if(auth()->check())
    {{Auth::user()->id}}<br>
    {{Auth::user()->email}}<br>
    {{Auth::user()->name}}<br>
@endif

</body>
</html>