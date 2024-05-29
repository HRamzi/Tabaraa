<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom styles for the sidebar and navbar -->
    <style>
        /* Sidebar */
        #layoutSidenav {
            transition: all 0.3s;
            z-index: 2;
        }

        #layoutSidenav #layoutSidenav_nav {
            background-color: #343a40;
            color: #ffffff;
            position: fixed;
            top: 0;
            left: -220px; /* Closed by default */
            bottom: 0;
            overflow-y: auto;
            width: 220px;
            z-index: 1;
            transition: all 0.3s;
            padding-top: 56px;
        }

        #layoutSidenav #layoutSidenav_nav .sb-sidenav {
            display: flex;
            flex-direction: column;
        }

        #layoutSidenav #layoutSidenav_nav .sb-sidenav a {
            padding: 10px 20px;
            color: #ffffff !important;
            transition: all 0.3s;
            text-align: left;
            white-space: nowrap;
        }

        #layoutSidenav #layoutSidenav_nav .sb-sidenav a:hover {
            background-color: #007bff;
        }

        #layoutSidenav #layoutSidenav_nav .sb-sidenav .sb-sidenav-menu-heading {
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
        }

        #layoutSidenav #layoutSidenav_nav .sb-sidenav .sb-sidenav-menu-heading a {
            color: #ffffff !important;
        }

        #layoutSidenav #layoutSidenav_nav.nav-open {
            left: 0;
        }

        #layoutSidenav #layoutSidenav_content {
            margin-left: 0;
            transition: all 0.3s;
        }

        #layoutSidenav #layoutSidenav_content.main-open {
            margin-left: 220px;
        }

        /* Navbar button */
        .navbar-toggler {
            color: #ffffff;
            border: none;
            background-color: transparent;
            outline: none;
            padding: 0;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .navbar-toggler-icon {
            color: #ffffff;
            font-size: 24px;
        }

        /* Navbar button on hover */
        .navbar-toggler:hover,
        .navbar-toggler:focus {
            color: #ffffff;
        }

        /* Header */
        .tabaraa-header {
            padding: 15px 0;
            background-color: #343a40;
            color: #ffffff;
            position: relative;
        }

        /* Header title */
        .tabaraa-header h1 {
            margin: 0;
            font-size: 24px;
        }

        /* User info */
        .tabaraa-header .user-info {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 15px;
            display: flex;
            align-items: center;
        }

        .tabaraa-header .user-info p {
            margin: 0;
            font-size: 16px;
            margin-left: 10px;
        }

        /* Navbar */
        .navbar {
            padding: 0 15px;
        }

        .navbar-brand {
            font-size: 18px;
        }

        .navbar-nav {
            font-size: 16px;
        }

        /* Logout button */
        .logout-btn {
            background-color: transparent;
            color: #ffffff;
            border: 1px solid #ffffff;
            padding: 6px 12px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .logout-btn:hover {
            background-color: #ffffff;
            color: #343a40;
        }

        /* Menu button */
        .menu-btn {
            color: #ffffff;
            border: none;
            background-color: transparent;
            outline: none;
            padding: 0;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            left: 15px;
            z-index: 100;
        }

        .menu-btn-icon {
            font-size: 24px;
        }

        /* Floating menu icon */
        .menu-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            color: #ffffff;
            background-color: #343a40;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .menu-toggle:hover {
            background-color: #007bff;
        }
    </style>
</head>
<body class="sb-nav-fixed">
<header class="tabaraa-header bg-dark">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col text-center">
                <h1 class="mt-4 text-white">Bienvenue à l'administration de Tabraaa</h1>
            </div>
            <div class="user-info">
                <p class="mt-4 text-white">
                    <i class="fas fa-user-circle"></i>
                    {{ Auth::user()->Nom_Complet }}
                </p>
            </div>
            <button class="menu-btn" id="sidebarToggle">
                <span class="menu-btn-icon"><i class="fas fa-bars"></i></span>
            </button>
        </div>
    </div>
</header>

<form id="logout-form" action="{{ route('deconnexion') }}" method="GET" style="display: none;">
    @csrf
</form>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
   
    <!-- Navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @else
            <li class="nav-item dropdown">
                <a  class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <button id="navbarDropdown" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout <i class="fas fa-sign-out-alt"></i>
                </button>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
            </li>
        @endguest
    </ul>
</nav>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav">
            <div class="sb-sidenav-menu">
               
                <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Utilisateurs
                </a>
                <a class="nav-link" href="{{ route('admin.annonces.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-ad"></i></div>
                    Annonces
                </a>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <!-- Main content area -->
        <div id="utilisateurs-content">
            <!-- Content of Utilisateurs page -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <div id="annonces-content">
            <!-- Content of Annonces page -->
            <div class="container-fluid">
                @yield('content1')
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Script for sidebar toggle -->
<script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        document.getElementById('layoutSidenav_nav').classList.toggle('nav-open');
        document.getElementById('layoutSidenav_content').classList.toggle('main-open');
    });
</script>
</body>
</html>
