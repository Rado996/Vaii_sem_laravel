<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app3.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- moje -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css15.css') }}" rel="stylesheet">
</head>
<body>
    <div class="hlava">
        <img src="{{asset('/storage/uploads/lastradalogo_1.png')}}" alt="Logo" />
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb"
                aria-controls="navb" aria-expanded="false" aria-label="Toggle navigation"   >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/Vaii_sem_laravel/public">Domov</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('menu_items.index')}}">Ponuka</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('photos.index')}}">Fotogaleria</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="{{route('comments.index')}}">Recenzie</a>
                </li>
            </ul>
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                        <span class="badge-warning p-1 m-2 rounded" >{{ Auth::user()->name }}   </span>
                        <a href="{{ route('logout') }}" id="odhlasenie" class="btn-danger rounded p-1 m-2 " onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"> Odhlásiť</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                         @else
                            <a href="{{ route('login') }}" class="btn-success  ">Login</a>

                             @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-success  ">Register</a>
                            @endif
                         @endauth
                    </div>
                @endif

        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>


</body>
</html>
