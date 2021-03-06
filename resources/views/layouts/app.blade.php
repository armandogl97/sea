<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="utf-8" />
   <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
   <link rel="icon" type="image/png" href="../assets/img/favicon.png">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <title>
      SEA
   </title>
   <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
   <!--     Fonts and icons     -->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
   <!-- CSS Files -->
   <link href="{{asset('css/material-kit.css?v=2.0.6')}}" rel="stylesheet" />
</head>
<body class="@yield('body-class')">
   @guest
   <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
      <div class="container">
         <div class="navbar-translate">
            <a class="navbar-brand" href="{{ url('/')}}">
               <strong>SEA</strong></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
               </button>
            </div>
            <div class="collapse navbar-collapse">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                  </li>
                  @if (Route::has('register'))
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                  </li>
                  @endif
                  <li class="nav-item">
                     <a target="_blank" href="{{ asset('img/MANUAL-SEA.pdf')}}" rel="tooltip" class="fa" title="Descargar manual" style="color: white;vertical-align: top;margin: 0;padding: 0">
                        <i class="material-icons">help</i>
                     </a>
                  </li>
                  
               </ul>
            </div>
         </div>
      </nav>

      @else
      @if (\Request::is('/'))
      <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
         <div class="container">
            <div class="navbar-translate">
               <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
               </button>
            </div>
            <div class="collapse navbar-collapse">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('home') }}">{{ __(Auth::user()->name) }} &#8212 {{ __('Mis Proyectos') }}</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>

      @else
      <nav class="navbar navbar-expand-lg bg-success" color-on-scroll="100" id="sectionsNav">
         <div class="container">
            <div class="navbar-translate">
               <a class="navbar-brand" href="{{ url('/login')}}">
                  <strong>SEA</strong></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="navbar-toggler-icon"></span>
                     <span class="navbar-toggler-icon"></span>
                     <span class="navbar-toggler-icon"></span>
                  </button>
               </div>
               <div class="collapse navbar-collapse">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                           {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="{{ url('/ppp') }}">Políticas-Planes-Programas</a>

                           <a class="dropdown-item" href="{{ url('/user') }}">Mi cuenta</a>

                           <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                           {{ __('Cerrar Sesión') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                        </form>
                     </div>
                  </li>

               </ul>
            </div>
         </div>
      </nav>
      @endif

      @endguest

      <div id="wrapper">
         @yield('content')
      </div>


   </body>
   <!--   Core JS Files   -->
   <script src="{{ asset('js/core/jquery.min.js')}}" type="text/javascript"></script>
   <script src="{{ asset('js/core/popper.min.js')}}" type="text/javascript"></script>
   <script src="{{ asset('js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
   <script src="{{ asset('js/plugins/moment.min.js">')}}"</script>
   <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
   <script src="{{ asset('js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
   <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
   <script src="{{ asset('js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
   <!--  Google Maps Plugin    -->
   <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
   <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
   <script src="{{ asset('js/material-kit.js?v=2.0.6')}}" type="text/javascript"></script>

   @yield('script')

   </html>
