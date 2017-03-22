<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <header class="navigation__header">
        <nav class="navigation navigation--align-right row">
            <div class="column column--half">
                <h1 class="navigation__brand">
                    <a class="" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </h1>
            </div>
            <div class="column column--half">
                <ul class="navigation__login row">
                    @if (Auth::guest())
                        <li class="column column--half"><a href="{{ route('login') }}">Login</a></li>
                        <li class="column column--half"><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="" id="js-toggle-slide-button">
                            <a href="#" class="navigation__username" role="button" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="navigation__logged" role="" id="js-toggle-slide-container">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </header>

        @yield('content')


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
