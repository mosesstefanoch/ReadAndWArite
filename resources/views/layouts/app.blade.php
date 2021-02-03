<html>

<head>
    <title>ReadAndWArite</title>
    <link href="/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>

<body class="background">
    <div class="row center search mb-20">
        <div class="row center search col-50 mr-40">
            <div class="bold f-20 mr-20">
                <a class="" onclick="window.history.back()">&#xFFE9; Back</a>
            </div>
            <div class="col-20 bold f-20 mr-40">
                <a href="{{ route('home') }}">ReadAndWArite</a>
            </div>
            <div class="row col-80">
                <form class="col-100 mr-20" id="search-form" action="" method="POST">
                    <input class="col-100 f-search" type="search" name="search" id="search" placeholder="Search">
                </form>
                <button class="btn-search" form="search-form" type="button" value="Search" onclick="window.location.href = '/home'">Search</button>
            </div>
        </div>
        <div class="row search">
            @guest
            <div class="nav-content">
                <a href="{{ route('login') }}">Login</a>
            </div>
            @if (Route::has('register'))
            <div class="nav-content">
                <a href="{{ route('register') }}">Register</a>
            </div>
            @endif
            @elseif(Auth::user()->is_admin)
            <div class="dropdown mr-20">
                <button class="btn-user f-15" onclick="myFunction()">{{ Auth::user()->name }} &#9660;</button>
                <div class="d-item" id="dropdown">
                    <a class="f-20" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @else
            <div class="dropdown mr-20">
                <button class="btn-user f-20" onclick="myFunction()">{{ Auth::user()->name }} &#9660;</button>
                <div class="d-item" id="dropdown">
                    <a class="f-20" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                </div>
            </div>
            <div class="row">
                <button class="btn-search mr-20" onclick="myFunction()">Cart</button>
                <button class="btn-search" onclick="myFunction()">History</button>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @endguest
        </div>
    </div>
    <main class="py-4">
        @yield('content')
    </main>
</body>
<script src="/js.js"></script>

</html>