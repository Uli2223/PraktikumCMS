<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Toko Roti Flo Bakery</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Playfair+Display:wght@700&display=swap');
        
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            color: #5d4037;
            background-color: #fff8e1;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d7ccc8' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        .navbar {
            background-color: #8d6e63;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
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
        
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding: 40px 0;
            border-bottom: 2px dashed #d7ccc8;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23d7ccc8' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
        }
        
        .header h1 {
            margin: 0;
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            color: #5d4037;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }
        
        .header p {
            margin: 15px 0 0;
            color: #8d6e63;
            font-size: 20px;
            font-style: italic;
        }
        
        .welcome-message {
            color: #5d4037;
            font-size: 16px;
            font-style: normal;
            margin-top: 10px;
        }
        
        .dashboard {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 40px;
        }
        
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            width: calc(25% - 20px);
            margin-bottom: 25px;
            overflow: hidden;
            transition: all 0.3s;
            border: 2px solid #f5f5f5;
        }
        
        .card:hover {
            box-shadow: 0 14px 28px rgba(0,0,0,0.2), 0 10px 10px rgba(0,0,0,0.15);
            transform: translateY(-10px);
            border-color: #efebe9;
        }
        
        .card-header {
            padding: 20px;
            background: linear-gradient(135deg, #a1887f, #8d6e63);
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .card-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='52' height='26' viewBox='0 0 52 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.8;
        }
        
        .card-header h3 {
            position: relative;
            z-index: 1;
            font-family: 'Playfair Display', serif;
            margin: 0;
            font-size: 24px;
        }
        
        .card-body {
            padding: 25px;
            text-align: center;
            min-height: 140px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: #fcfaf7;
        }
        
        .card-body p {
            font-size: 16px;
            color: #6d4c41;
            margin: 0;
            line-height: 1.6;
        }
        
        .card-footer {
            padding: 15px;
            background-color: #f5f5f5;
            text-align: center;
            border-top: 1px dashed #e0e0e0;
        }
        
        .card-footer a {
            color: #8d6e63;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
            display: inline-block;
            padding: 8px 16px;
            border-radius: 25px;
            border: 2px solid #d7ccc8;
        }
        
        .card-footer a:hover {
            background-color: #8d6e63;
            color: white;
            text-decoration: none;
            border-color: #8d6e63;
        }
        
        .btn-login {
            background: linear-gradient(135deg, #a1887f, #8d6e63);
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(141, 110, 99, 0.3);
            transition: all 0.3s;
            display: inline-block;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        
        .btn-login:hover {
            background: linear-gradient(135deg, #8d6e63, #a1887f);
            color: white;
            transform: translateY(-2px);
        }
        
        .about-system {
            text-align: center;
            margin-top: 40px;
            padding: 40px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px 0;
            color: #8d6e63;
            border-top: 2px dashed #d7ccc8;
            background-color: #fcfaf7;
            box-shadow: 0 -2px 15px rgba(0,0,0,0.05);
        }
        
        @media screen and (max-width: 992px) {
            .card {
                width: calc(50% - 20px);
            }
        }
        
        @media screen and (max-width: 576px) {
            .card {
                width: 100%;
            }
            
            .navbar a, .navbar-right {
                float: none;
                display: block;
                text-align: left;
            }
            
            .header h1 {
                font-size: 32px;
            }
            
            .navbar-right {
                margin-top: 10px;
                padding-left: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
        @auth
            <a href="{{ route('pelanggan.index') }}" class="{{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">Pelanggan</a>
            <a href="{{ route('produk.index') }}" class="{{ request()->routeIs('produk.*') ? 'active' : '' }}">Produk</a>
            <a href="{{ route('karyawan.index') }}" class="{{ request()->routeIs('karyawan.*') ? 'active' : '' }}">Karyawan</a>
            <a href="{{ route('pembayaran.index') }}" class="{{ request()->routeIs('pembayaran.*') ? 'active' : '' }}">Transaksi</a>
        @endauth
        
        <div class="navbar-right">
            @auth
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </div>
    
    <div class="container">
        @auth
            <div class="header">
                <h1>Toko Roti "Flo Bakery"</h1>
                <p>Kelola bisnis roti Anda dengan sistem yang seenak produk Anda</p>
                <p class="welcome-message">Selamat datang, {{ Auth::user()->name }}!</p>
            </div>
            
            <div class="dashboard">
                <div class="card">
                    <div class="card-header">
                        <h3>Pelanggan</h3>
                    </div>
                    <div class="card-body">
                        <p>Kenali lebih dekat para penikmat roti Anda. Kelola data pelanggan setia dan tingkatkan pengalaman mereka di toko roti Anda.</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('pelanggan.index') }}">Daftar Pelanggan</a>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h3>Produk</h3>
                    </div>
                    <div class="card-body">
                        <p>Sajikan berbagai kreasi roti terbaik! Kelola katalog produk, stok bahan, dan pantau roti-roti favorit pelanggan Anda.</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('produk.index') }}">Katalog Roti</a>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h3>Karyawan</h3>
                    </div>
                    <div class="card-body">
                        <p>Tim baker & staff adalah kunci kesuksesan. Kelola jadwal, keahlian, dan data karyawan untuk menciptakan tim yang solid dan produktif.</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('karyawan.index') }}">Tim Bakery</a>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h3>Transaksi</h3>
                    </div>
                    <div class="card-body">
                        <p>Catat setiap penjualan dengan rapi. Lacak pendapatan harian, analisis tren penjualan, dan ketahui produk roti paling laris Anda.</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('pembayaran.index') }}">Penjualan</a>
                    </div>
                </div>
            </div>
        @else
            <div class="header">
                <h1>Toko Roti "Flo Bakery"</h1>
                <p>Sistem Manajemen Toko Roti Profesional</p>
                <div style="margin-top:30px">
                    <a href="{{ route('login') }}" class="btn-login">Login untuk Mengakses Sistem</a>
                </div>
            </div>
            
            <div class="about-system">
                <h2 style="color:#5d4037; font-family:'Playfair Display', serif;">Tentang Sistem Kami</h2>
                <p style="color:#6d4c41; max-width:800px; margin:0 auto;">
                    Sistem Manajemen Toko Roti Flo Bakery membantu Anda mengelola pelanggan, produk, karyawan, 
                    dan transaksi dengan mudah. Login untuk mengakses fitur lengkap sistem kami.
                </p>
            </div>
        @endauth
    </div>
    
    <footer>
        <p>&copy; {{ date('Y') }} Flo Bakery. Sistem Manajemen Toko Roti. By Nur Rizky Zuliani.</p>
    </footer>
</body>
</html>