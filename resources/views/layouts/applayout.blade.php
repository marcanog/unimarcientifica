
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Unimar Científica @yield('co-title')</title>
        <link  rel="icon" href="{{asset('images/rcu-orange-isotype.png')}}" type="image/png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    </head>

    <body>
        <div class=".container-xl">
            <!------------------------------------------------- NAVBAR ------------------------------------------------------------>
            <nav class="navbar navbar-expand-md sticky-top" style="margin-bottom: 0;">
                <!------------------------------------------------- LOGO ------------------------------------------------------------>
                    <ul class="navbar-nav">
                        <div class="logotipo">
                            <a href="{{route('welcome')}}">
                                <img src="{{ asset('images/rcu-yellow-logo.png') }}" alt="logo" width="195px" height="auto" style="margin-top:10px; margin-bottom:10px; margin-left:10px;">
                            </a>
                        </div>
                    </ul>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                        <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true" style="color:#e6e6ff; margin-top:5px;"></i></span>
                    </button>

                    <div class="collapse navbar-collapse flex" id="collapse_target">
                    <!------------------------------------------------- ENLACES ------------------------------------------------------------>
                    <ul class="navbar-nav ml-auto justify-content-end">
                        <li class="navbar-item dropdown">
                            <a class="nav-link dropdown-toggle btn-group" data-toggle="dropdown" id="dropdown_target" href="#">
                                @lang('data.secciones')
                                <!--<span class="caret"></span>-->
                                <span></span>
                            </a>
                            <div class=" dropdown-menu" id="lineas" arial-labelledby="dropdown_target">
                                <a class="dropdown-item" href="{{url('seccion', ['section' => 'biologia'])}}">@lang('data.biologia')</a>
                                <a class="dropdown-item" href="{{url('seccion', ['section' => 'derecho'])}}">@lang('data.derecho')</a>
                                <a class="dropdown-item" href="{{url('seccion', ['section' => 'economia'])}}">@lang('data.economia')</a>
                                <a class="dropdown-item" href="{{url('seccion', ['section' => 'educacion'])}}">@lang('data.educacion')</a>
                                <a class="dropdown-item" href="{{url('seccion', ['section' => 'epistemologia'])}}">@lang('data.epistemologia')</a>
                                <a class="dropdown-item" href="{{url('seccion', ['section' => 'filosofia'])}}">@lang('data.filosofia')</a>
                                <a class="dropdown-item" href="{{url('seccion', ['section' => 'gerencia'])}}">@lang('data.gerencia')</a>
                            </div>
                        </li>
                        <li class="navbar-item">
                            <a class="nav-link"  href="{{route('autores')}}">@lang('data.autores')</a>
                        </li>
                        <li class="navbar-item">
                            <a class="nav-link" href="{{route('edicion')}}">@lang('data.ediciones')</a>
                        </li>
                        <li class="navbar-item">
                            <a class="nav-link" href="{{route('informacion')}}">@lang('data.contacto')</a>
                        </li>
                        <!------------------------------------------------- BUSCADOR ------------------------------------------------------------>
                        <li class="navbar-item dropdown" id="icons">
                            <button class="btn dropdown-toggle" type="button" id="dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-search fa-fw"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="dropdownSearch" style="aling-items: center;">
                                <form class="px-4 py-3" type="get" action=" {{route('search')}} ">
                                    <input class="input" type="text" name="query" placeholder="@lang('data.buscar')...">
                                    <button type="button" class="btn btn-success">@lang('data.buscar')</button>
                                </form>
                            </div>

                        </li>
                        <!------------------------------------------------- ICONOS DE IDIOMAS ------------------------------------------------------------>
                        <li class="navbar-item dropdown" id="icons">
                            <button class="btn dropdown-toggle" type="button" id="dropdownLanguajeButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-globe fa-fw">{{ App::getLocale() }}</i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="dropdownLanguajeButton" style="text-align: center;">
                                <a class="dropdown-item" href="{{url('lang', ['locale' => 'es'])}}"> <img src="{{ asset('images/spanish-icon.png') }}" alt="lang" width="16px" height="auto"> @lang('data.español')</a>
                                <a class="dropdown-item" href="{{url('lang', ['locale' => 'en'])}}"> <img src="{{ asset('images/english-icon.png') }}" alt="lang" width="16px" height="auto"> @lang('data.ingles')</a>
                            </div>
                        </li>
                        <!------------------------------------------------- USUARIO ------------------------------------------------------------>
                        @guest
                        <li class="nav-item dropdown" id="icons">
                            <button class="btn dropdown-toggle" type="button" id="dropdownSingin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle fa-fw"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="dropdownSingin"  style="text-align: center;">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#loginModal">@lang('data.iniciar_sesion')</a>
                            </div>
                        </li>

                        @else
                        <li class="nav-item dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownSingUp" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#fff; margin-top:5px;">
                                {{ Auth::user()->name }}
                                <span class="caret">
                            </button>

                            <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="dropdownSingUp">

                                @hasrole('Admin')
                                    <a class="dropdown-item" href="{{ route('admin') }}">Panel de Administrador</a>
                                @endhasrole

                                @hasrole('comment_admin')
                                    <a class="dropdown-item" href="{{ route('admin') }}">Panel de Administrador</a>
                                @endhasrole

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                            </div>

                        </li>
                        @endguest

                    </ul>

                </div>

            </nav>

            <!------------------------------------------------- CONTENIDO ------------------------------------------------------------>
            <main>
                @yield('content')
            </main>
            <!------------------------------------------------- FOOTER ------------------------------------------------------------>

            <div class="footer col-sm-12">
                <div class="row" id="contenido-footer">
                    <!------------------------------------------------- REDES SOCIALES ------------------------------------------------------------>
                    <div class="col-sm">
                        <ul id="social-media">
                            <div class="social-media-title">
                                <p><b>@lang('data.redes_sociales')</p></b>
                            </div>
                            <div class="social-icons">
                                <a href="http://www.facebook.com/univ.demargarita/" class="social__icon--link"><i class="fab fa-facebook-f"></i></a>
                                <a href="http://www.instagram.com/universidademargarita/" class="social__icon--link"><i class="fab fa-instagram"></i></a>
                                <a href="http://www.twitter.com/somosunimar/" class="social__icon--link"><i class="fab fa-twitter"></i></a>
                                <a href="http://www.linkedin.com/in/universidad-de-margarita-7a2a37208/" class="social__icon--link"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </ul>
                    </div>
                    <!------------------------------------------------- BLANC SPACE ------------------------------------------------------------>
                    <div class="col-sm" id="unimarlogo">
                        <div class="unimar-link">
                            <a href="http://www.unimar.edu.ve/unimarportal/index.php">
                                <img src="{{ asset('/images/unimar-white-logo.png') }}" alt="logo blanco">
                            </a>
                        </div>
                    </div>

                    <!------------------------------------------------- ENLACE DE UNIMAR ------------------------------------------------------------>
                    <div class="col-sm">
                        <div class="pev-link">
                            <a href="https://www.unimarcientifica.edu.ve/adminmoodle/">
                                <img src="{{ asset('/images/moodle-white-logo.png') }}" alt="logo blanco">
                            </a>
                        </div>
                    </div>

                </div>
                <div class="footer-copy" style="align:center">
                    <p><b> Universidad de Margarita 2021 Copyright &copy @lang('data.derechos')</b></p>
                </div>
            </div>

        </div>
    <!------------------------------------------------- SCRIPTS ------------------------------------------------------------>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @include('auth.login')
    @include('auth.register')
    </body>
</html>
