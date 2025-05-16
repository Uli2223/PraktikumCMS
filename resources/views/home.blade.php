<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Toko</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            color: #333;
        }
        
        .navbar {
            background-color: #333;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .navbar a {
            float: left;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 17px;
            transition: background-color 0.3s;
        }
        
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        
        .navbar a.active {
            background-color: #4CAF50;
            color: white;
        }
        
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px 0;
            border-bottom: 1px solid #eee;
        }
        
        .header h1 {
            margin: 0;
            font-size: 36px;
            color: #333;
        }
        
        .header p {
            margin: 10px 0 0;
            color: #777;
            font-size: 18px;
        }
        
        .dashboard {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 40px;
        }
        
        .card {
            background: white;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            width: calc(25% - 20px);
            margin-bottom: 20px;
            overflow: hidden;
            transition: all 0.3s;
        }
        
        .card:hover {
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
            transform: translateY(-5px);
        }
        
        .card-header {
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
        }
        
        .card-body {
            padding: 15px;
            text-align: center;
        }
        
        .card-body h2 {
            font-size: 32px;
            margin: 10px 0;
            color: #333;
        }
        
        .card-footer {
            padding: 10px 15px;
            background-color: #f9f9f9;
            text-align: center;
            border-top: 1px solid #eee;
        }
        
        .card-footer a {
            color: #4CAF50;
            text-decoration: none;
        }
        
        .card-footer a:hover {
            text-decoration: underline;
        }
        
        footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px 0;
            color: #777;
            border-top: 1px solid #eee;
        }
        
        @media screen and (max-width: 768px) {
            .card {
                width: calc(50% - 20px);
            }
        }
        
        @media screen and (max-width: 480px) {
            .card {
                width: 100%;
            }
            
            .navbar a {
                float: none;
                display: block;
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="{{ route('home') }}" class="active">Home</a>
        <a href="{{ route('pelanggan.index') }}">Pelanggan</a>
        <a href="{{ route('produk.index') }}">Produk</a>
        <a href="{{ route('karyawan.index') }}">Karyawan</a>
        <a href="{{ route('pembayaran.index') }}">Transaksi</a>
    </div>
    
    <div class="container">
        <div class="header">
            <h1>Sistem Manajemen Toko</h1>
            <p>Selamat datang di dashboard sistem manajemen toko</p>
        </div>
        
        <div class="dashboard">
            <div class="card">
                <div class="card-header">
                    <h3>Pelanggan</h3>
                </div>
                <div class="card-body">
                    <h2>{{ $totalPelanggan ?? 0 }}</h2>
                    <p>Total Pelanggan</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('pelanggan.index') }}">Lihat Detail</a>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h3>Produk</h3>
                </div>
                <div class="card-body">
                    <h2>{{ $totalProduk ?? 0 }}</h2>
                    <p>Total Produk</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('produk.index') }}">Lihat Detail</a>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h3>Karyawan</h3>
                </div>
                <div class="card-body">
                    <h2>{{ $totalKaryawan ?? 0 }}</h2>
                    <p>Total Karyawan</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('karyawan.index') }}">Lihat Detail</a>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h3>Transaksi</h3>
                </div>
                <div class="card-body">
                    <h2>{{ $totalTransaksi ?? 0 }}</h2>
                    <p>Total Transaksi</p>
                </div>
                <div class="card-footer">
                    <a href="#">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>
    
    <footer>
        <p>&copy; {{ date('Y') }} Sistem Manajemen Toko. All Rights Reserved.</p>
    </footer>
</body>
</html>