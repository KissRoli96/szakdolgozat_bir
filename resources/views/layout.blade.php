<html>

<head>
    <title>Bir App  @yield('title')</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">BIR Laravel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            @auth
                @if(!Auth::hasRole('student'))
                    <li class="nav-item">
                        <a class="nav-link" href="/user">Felhasználók</a>
                    </li>
                @endif
            @endauth
                <li class="nav-item">
                    <a class="nav-link" href="/theses">Szakdolgozatok</a>
                </li>
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="/courses">Kurzusok</a>
                </li>
            @endauth

            <li class="nav-item">
                <a class="nav-link" href="/classrooms">Osztálytermek</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/demonstrators">Demonstrátor jelentkezés</a>
             </li>
            @auth
                @if(Auth::hasRole('department_leader'))
                <li class="nav-item">
                    <a class="nav-link" href="/judgement">Szakdolgozat Bírálás</a>
                </li>
                @endif
            @endauth

        </ul>

        <ul class="navbar-nav ml-auto">
            @guest
            <li class="nav-item">
                <a class="btn btn-success" href="/login">Belépés</a>
            </li>
            @endguest

            @auth
                <li class="nav-item">
                    <a class="btn btn-success" href="/logout">Kilépés ({{Auth::user()->name}})</a>
                </li>
            @endauth

        </ul>
    </div>
</nav>

<div class="container">
    @if(Session::has('success'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
    @endif

    @if(Session::has('error'))
        <p class="alert {{ Session::get('alert-class', 'alert-error') }}">{{ Session::get('error') }}</p>
    @endif

    @yield('content')
</div>
</body>

</html>
