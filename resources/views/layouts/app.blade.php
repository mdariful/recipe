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
    <link href="{{ URL::asset('style.css') }}" rel="stylesheet">
     <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/css/select2.min.css" rel="stylesheet" />
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
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                @if (Auth::guest())
                <a class="navbar-brand" href="{{ url('/') }}">
                    My recipe
                </a>
                @else
                <a class="navbar-brand" href="{{ url('/home') }}">
                    My recipe
                </a>
                @endif
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!--<li><a href="{{ url('/home') }}">Home</a></li>-->
                    <li><a href="{{ route('recipe.index') }}">Ricette</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">

                    
                 
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                      @if (auth()->check())
                   @if (auth()->user()->is_admin())
                      <li><a href="{{ route('admin.index') }}">Amministrazione</a></li>
                      <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Menu
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('recipe.create') }}">Crea ricette</a></li>
                                
                            </ul>
                        </li>
                   @else
                     <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Menu
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('recipe.create') }}">Crea ricette</a></li>
                                
                            </ul>
                        </li>
                    @endif
                    @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                {!! Form::open(['url' => '/search', 'method' => 'get', 'class' => 'navbar-form navbar-left', 'role' => 'ingrediente']) !!}
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Cerca ricetta" name="ingrediente">
                    
                    </div>
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    
                    
                {!! Form::close() !!}
                
                
                
                </ul>
            </div>
        </div>
    </nav>
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
<!--<ol class="breadcrumb">
 <li>
  <a href="{{route('recipe.index')}}">Home</a>
</li>
@for($i = 0; $i <= count(Request::segments()); $i++)
<li>
  <a href="">{{Request::segment($i)}}</a>
</li>
@endfor
</ol>-->
    @yield('content')
    
    <!-- JavaScripts -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/js/select2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    @yield('footer')
</body>
</html>