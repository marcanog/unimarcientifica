<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Unimar Científica @yield('co-title')</title>
        <link  rel="icon" href="/images/unimar-científica.png" type="image/png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css') }}">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    </head>

    <body>
      <!--NAVBAR-->
      <nav>
        <div class="navbar">
        
          <div class="logo">
            <img src="{{ asset('images/unimar-científica-logo-white.png') }}" alt="logo" width="190px" height="auto">
          </div>
          <div class="nav-links">
            <div class="sidebar-logo">
              <img src="{{ asset('images/unimar-científica-logo-white.png') }}" alt="logo" width="190px" height="auto">
              <i class='bx bx-x'></i>
            </div>
            <ul class="links">
              <li>
                <a href="#">Lineas de Investigación</a>
                <i class='bx bx-chevron-down arrow hoverarrow'></i>
                <ul class="dropdown-menu sub-menu">
                  <li><a href="#">sera</a></li>
                  <li><a href="#">que</a></li>
                  <li><a href="#">esto</a></li>
                  <li><a href="#">si</a></li>
                  <li><a href="#">funciona?</a></li>
                </ul>
              </li>
              <li>
                <a href="#">Autores
              </li>
              <li>
                <a href="#">Ediciones</a>
              </li>
              <li>
                <a href="#">Informacion</a>
              </li>
              <li>
                <a href="#"><i class='bx bx-search-alt'></i></a>
                <i class='bx bx-chevron-down arrow hoverarrow'></i>
                <ul class="dropdown-menu search-bar">
                  <form class="search" type="get" action=" {{route('search')}} ">
                    <input class="input" type="text" name="query" placeholder="@lang('data.buscar')...">
                  </form>
                </ul>
              </li>
              <li>
                <a href="#"><i class='bx bx-world' ></i></a>
                <i class='bx bx-chevron-down arrow hoverarrow'></i>
                  <ul class="dropdown-menu sub-menu">
                    <li><a href="#">Español</a></li>
                    <li><a href="#">Ingles</a></li>
                  </ul>
              </li>
              <li>
                <a href="#"><i class='bx bxs-user'></i></i></a>
                <i class='bx bx-chevron-down arrow hoverarrow'></i>
                  <ul class="dropdown-menu sub-menu">
                    <li><a href="#">Iniciar Sesión</a></li>
                    <li><a href="#">Registrarse</a></li>
                  </ul>
              </li>
            </ul>
          </div>
          <i class='bx bx-menu'></i>
        </div>
      </nav>  
      <!-- Page content -->
      <div class="content">
      
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