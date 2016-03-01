<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Recipe</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ URL::asset('admin.css') }}" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
<div class="nav-side-menu">
  <div class="brand">My recipe panel</div>
  <div class="brand"><img width="100" src="https://avatars1.githubusercontent.com/u/8091848?v=3&s=460" alt="" class="img-circle" /><br />Bentornato {{ Auth::user()->name }}</div>

   <i class="fa fa-bars fa-3x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

  <div class="menu-list">



    <ul id="menu-content" class="menu-content collapse out">
    <li>
      <a href="{{ route('admin.index') }}">
      <i class="fa fa-dashboard fa-lg"></i> Dashboard
      </a>
    </li>


    <li data-toggle="collapse" data-target="#user" class="collapsed">
      <a href="#"><i class="fa fa-users fa-lg"></i> Utenti <span class="arrow"></span></a>
    </li>
    <ul class="sub-menu collapse out" id="user">
      <li><a href="{{ route('admin.user') }}">Utenti</a></li>
      <li><a href="{{ route('admin.create') }}">Crea utente</a></li>
    </ul>


    <li data-toggle="collapse" data-target="#recipe" class="collapsed">
      <a href="#"><i class="fa fa-cutlery fa-lg"></i> Ricette <span class="arrow"></span></a>
    </li>
    <ul class="sub-menu collapse out" id="recipe">
      <li><a href="{{ route('admin.recipe') }}">Visualizza Ricette</a></li>
      <li><a href="{{ route('recipe.create') }}">Crea Ricetta</a></li>
      <li><a href="{{ route('admin.ingredient') }}">Ingredienti</a></li>
    </ul>
    <li>
      <a href="{{ url('/logout') }}">
      <i class="fa fa-sign-out fa-lg"></i> Esci
      </a>
    </li>
    <li>
      <a href="{{ route('recipe.index') }}">
      <i class="fa fa-arrow-circle-left fa-lg"></i> Torna al sito
      </a>
    </li>

</ul>
  </div>
</div>

    @yield('content')
    <div class="container">
    @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
    @if(Session::has('flash_message_delete'))
            <div class="alert alert-danger">
                {{ Session::get('flash_message_delete') }}
            </div>
        @endif
    @if(Session::has('flash_message_warning'))
            <div class="alert alert-warning">
                {{ Session::get('flash_message_warning') }}
            </div>
        @endif
        </div>
    <!-- JavaScripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    @yield('footer')
</body>
</html>