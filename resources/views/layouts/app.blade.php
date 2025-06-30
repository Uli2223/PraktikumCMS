<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Flo Bakery - @yield('title', 'Sistem Manajemen Toko Roti')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #fff8e1;
            font-family: 'Roboto', sans-serif;
            color: #5d4037;
            line-height: 1.6;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d7ccc8' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .navbar {
            background-color: #8d6e63;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            padding: 0;
        }
        
        .navbar a {
            float: left;
            color: #fff8e1;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 17px;
            transition: all 0.3s;
        }
        
        .navbar a:hover {
            background-color: #a1887f;
            color: #fff;
        }
        
        .navbar a.active {
            background-color: #d4a056;
            color: white;
        }

        .navbar-right {
            float: right;
        }

        .navbar-right a {
            display: inline-block;
        }

        header {
            background-color: white;
            padding: 2rem 1rem;
            text-align: center;
            color: #5d4037;
            font-weight: bold;
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-bottom: 2px dashed #d7ccc8;
            margin-bottom: 2rem;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23d7ccc8' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        header p {
            margin: 10px 0 0;
            color: #8d6e63;
            font-size: 18px;
            font-style: italic;
            font-family: 'Roboto', sans-serif;
            font-weight: normal;
        }

        .container {
            background-color: white;
            border-radius: 12px;
            padding: 2rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border: 2px solid #f5f5f5;
        }

        footer {
            text-align: center;
            padding: 20px 0;
            color: #8d6e63;
            border-top: 2px dashed #d7ccc8;
            background-color: #fcfaf7;
            box-shadow: 0 -2px 15px rgba(0,0,0,0.05);
            margin-top: 2rem;
        }

        .btn-primary {
            background-color: #8d6e63;
            border-color: #8d6e63;
        }

        .btn-primary:hover {
            background-color: #a1887f;
            border-color: #a1887f;
        }

        .btn-login {
            background-color: #d4a056;
            border-color: #d4a056;
            color: white;
        }

        .btn-login:hover {
            background-color: #e0b878;
            border-color: #e0b878;
        }

        a, a:hover {
            color: #8d6e63;
        }

        .welcome-message {
            color: #5d4037;
            font-size: 16px;
            margin-top: 10px;
            font-style: normal;
        }

        @media screen and (max-width: 576px) {
            .navbar a {
                float: none;
                display: block;
                text-align: left;
            }
            
            .navbar-right {
                float: none;
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
        
        @auth
            <!-- Menu yang hanya muncul setelah login -->
            <a href="{{ route('pelanggan.index') }}" class="{{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">Pelanggan</a>
            <a href="{{ route('produk.index') }}" class="{{ request()->routeIs('produk.*') ? 'active' : '' }}">Produk</a>
            <a href="{{ route('karyawan.index') }}" class="{{ request()->routeIs('karyawan.*') ? 'active' : '' }}">Karyawan</a>
            <a href="{{ route('pembayaran.index') }}" class="{{ request()->routeIs('pembayaran.*') ? 'active' : '' }}">Transaksi</a>
        @endauth
        
        <div class="navbar-right">
            @auth
                <span style="color: #fff8e1; padding: 14px 20px; display: inline-block;">
                    Halo, {{ Auth::user()->name }}
                </span>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" 
                       style="background-color: #d4a056; border-radius: 4px; margin-right: 10px;">
                        Logout
                    </a>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn-login" style="border-radius: 4px; margin-right: 10px;">
                    Login
                </a>
                @if(Route::has('register'))
                    <a href="{{ route('register') }}" style="margin-right: 10px;">
                        Register
                    </a>
                @endif
            @endauth
        </div>
    </div>
    
    <header>
        <h1>@yield('header-title', 'Flo Bakery')</h1>
        <p>@yield('header-subtitle', 'Sistem Manajemen Toko Roti')</p>
        @auth
            <p class="welcome-message">Selamat datang kembali di sistem manajemen toko roti Anda!</p>
        @endauth
    </header>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @yield('content')
    </div>

    <footer>
        &copy; {{ date('Y') }} Flo Bakery - Cinta Roti, Cinta Kamu. By Nur Rizky Zuliani.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>