<html>

<head>
    <title>Welcome Page</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>

<body>
    <div class="row nav">
        <div class="nav-content">
            <a href="{{ route('login') }}">LOGIN</a>
        </div>
        <div class="nav-content">
            <a href="{{ route('register') }}">REGISTER</a>
        </div>
    </div>
    <div class="row center t-center">
        <div class="col-40 title">
            ReadAndWArite
        </div>
    </div>
    <div class="row center t-center search">
        <div class="col-40">
            <form action="">
                <input class="col-80 w-search" type="search" name="" id="search" placeholder="Search for stationary">
            </form>
            <button class="btn-search f-20" form="search-form" type="button" value="Search" onclick="window.location.href = '/home'">Search</button>
        </div>
    </div>
    <div class="row center t-center product">
        <div class="col-20">
            <img src="assets/notebook1.jpg" alt="">
        </div>
        <div class="col-20">
            <img src="assets/smartpen2.jpg" alt="">
        </div>
        <div class="col-20">
            <img src="assets/ruler1.jpg" alt="">
        </div>
        <div class="col-20">
            <img src="assets/dictionary1.jpg" alt="">
        </div>
    </div>
</body>

</html>