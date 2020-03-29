<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="{{ asset('js/MyScripts.js') }}" ></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet">
    <link href="vendor/swiper/css/swiper.min.css" rel="stylesheet" type="text/css"/>
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css"/>
    <link href="css/layout.min.css" rel="stylesheet" type="text/css"/>
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
    $(document).ready (function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $("#searchroom_button").bind("click",function(){
      $.ajax({
        url:'/searchroom',
        type: 'POST',
         data: ({_token: CSRF_TOKEN, 'dormitory_for_search': $("#dormitory_for_search").val(),'floor_for_search': $("#floor_for_search").val(),'free_for_search': $("#free_for_search").val()}),

        dataType: 'html',
        beforeSend: function(){
          $("#searchroom_result").text("Ожидание данных");
        },
        success: function(data){

          $("#searchroom_result").html(data).fadeIn();

        }
      });
    });

    $("#studentsearch_input").bind("keyup",function(){
      $.ajax({
        url:'/searchstudent',
        type: 'POST',
         data: ({_token: CSRF_TOKEN, 'first_name': $("#studentsearch_input").val()}),

        dataType: 'html',
        beforeSend: function(){
          $("#searchstudent_result").text("Ожидание данных");
        },
        success: function(data){

          $("#searchstudent_result").html(data).fadeIn();

        }
      });
    });
  });
</script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/searchStudents.css') }}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
    <script type="text/javascript">

</script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" style="font-size: 24px;" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="/#products">Наши общежития</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#service">Информация</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#work">События</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#pricing">Документы</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#contact">Контакты</a></li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('login') }}">{{ __('Войти') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                     @if(Auth::user()->type=="admin")
                                        <a class="dropdown-item" href="{{ url('/rooms') }}">
                                        {{ __("Просмотр комнат") }}
                                        </a>
                                        <a class="dropdown-item" href="{{ url('/students') }}">
                                        {{ __("Студенты") }}
                                        </a>
                                        <a class="dropdown-item" href="{{ url('/viewstudentrequest') }}">
                                            {{ __("Заявки на обслуживание") }}
                                        </a>
                                    @endif
                                     @if(Auth::user()->type=="Facultys")
                                        <a class="dropdown-item" href="{{ url('/studentsByFaculties') }}">
                                        {{ __("Просмотр студентов") }}
                                        </a>
                                        <a class="dropdown-item" href="{{ url('/requests') }}">
                                        {{ __("Просмотр заявок") }}
                                        </a>
                                    @endif
                                         @if(Auth::user()->type=="Students")
                                             <a class="dropdown-item" href="{{ url('/aboutuser') }}">
                                                 {{ __("Личный кабинет") }}
                                             </a>
                                             <a class="dropdown-item" href="{{ url('/studentrequest') }}">
                                                 {{ __("Оставить заявку") }}
                                             </a>
                                             <a class="dropdown-item" href="{{ url('/makeinvoice') }}">
                                                 {{ __("Отправить квитанцию") }}
                                             </a>

                                         @endif
                                         @if(Auth::user()->type=="Managers")
                                             <a class="dropdown-item" href="{{ url('/students') }}">
                                                 {{ __("Поиск студентов") }}
                                             </a>
                                             <a class="dropdown-item" href="{{ url('/invoices') }}">
                                                 {{ __("Квитанции") }}
                                             </a>

                                         @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
