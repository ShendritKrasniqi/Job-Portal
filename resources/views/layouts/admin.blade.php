<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets/styles/style.css') }}" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand" href="{{ auth()->check() ? route('admins.dashboard') : url()->current() }}">Administrator</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            @auth('admin')
            <ul class="navbar-nav side-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admins.dashboard') ? 'text-white' : '' }}" style="margin-left: 20px;" href="{{ route('admins.dashboard') }}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('view.admins') ? 'text-white' : '' }}" href="{{ route('view.admins') }}" style="margin-left: 20px;">Admins</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('display.categories') ? 'text-white' : '' }}" href="{{ route('display.categories') }}" style="margin-left: 20px;">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('display.jobs') ? 'text-white' : '' }}" href="{{ route('display.jobs') }}" style="margin-left: 20px;">Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('display.apps') ? 'text-white' : '' }}" href="{{ route('display.apps') }}" style="margin-left: 20px;">Applications</a>
                </li>
            </ul>
            @endauth

            <ul class="navbar-nav ml-md-auto d-md-flex">
                @auth('admin')
                <li class="nav-item">
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ Auth::guard('admin')->user()->name }}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="dropdown-item">Logout</button>
        </form>
    </div>
</li>
                @else
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'text-white' : '' }}" href="{{ route('home') }}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                @endauth
            </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</div>
<script type="text/javascript">
   
</script>
</body>
</html>