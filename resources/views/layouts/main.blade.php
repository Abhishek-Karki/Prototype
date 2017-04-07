<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Student Assessment System') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}" type="text/css" >
    <link rel="stylesheet" href="{!! asset('css/select2.min.css') !!}" type="text/css" >
    <style type="text/css">
        .bs-example{
            margin: 20px;
        }
    </style>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="{!! asset('js/jquery.min.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('js/select2.min.js') !!}"></script>

</head>
<body>
<div id="app">
    <div class="bs-example">
        <nav role="navigation" class="navbar navbar-default">

            <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{url('/home')}}" class="navbar-brand">Student Assessment System</a>
            </div>

            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{url('/home')}}">Home</a></li>
                    <li><a href="{{url('majors')}}">Majors</a></li>
                    <li><a href="{{url('modules')}}">Modules</a></li>
                    <li><a href="{{url('groups')}}">Groups</a></li>
                    <li><a href="{{url('students')}}">Students</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>


    @yield('content')
</div>
</body>
</html>