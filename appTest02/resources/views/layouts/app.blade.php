<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts --> @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <header class="gl-header">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3 shadow-sm">
                <div class="container">
                    <h1><a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-book"></i> 書籍管理</a></h1>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="/"><i class="fa fa-home"></i> トップ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/books"><i class="fa fa-plus"></i> 新規追加</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contact"><i class="fa fa-wpforms"></i> お問い合わせ</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            <!-- 一般ユーザ --> @guest @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <i class="fa fa-sign-in"></i> {{ __('ja.Login') }}
                                    </a>
                                </li>
                                @endif @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">
                                            <i class="fa fa-user"></i> {{ __('ja.Assign') }}
                                        </a>
                                    </li>
                                @endif <!-- ログイン済みユーザ -->
                            @else
                                <li class="nav-item">
                                    <a class="nav-link">{{ Auth::user()->name }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-in"></i> {{ __('ja.Logout') }}
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf</form> @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container">
        <div class="card">
            <h2 class="display-5 card-title text-center mt-4">@yield('title')</h2>
            <div class="card-body">@yield('content')</div>
        </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
