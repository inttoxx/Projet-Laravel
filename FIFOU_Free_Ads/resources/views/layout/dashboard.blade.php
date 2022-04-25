<!DOCTYPE html>
<html>
<head>
    <title>Free Ads</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="/">FreeAds</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('NewAd')}}">New Ads</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('NewAd')}}">New Ads</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('EspacePersoUsers')}}">My Ads</a>
                    </li>
                    @if(Auth::user()->admin==1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin')}}">Admin Center</a>
                        </li>
                    @endif
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main class='container'>
        @if(session('success'))
            <div class="alert alert-primary">
            <p class="text-center" role="alert">{{session('success')}}</p>
            </div>
        @endif
        @yield('content')
    </main>
</body>
</html>