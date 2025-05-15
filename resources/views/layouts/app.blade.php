<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Pelanggan - Flo Bakery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fef7f1;
            font-family: 'Segoe UI', sans-serif;
            color: #5a3e2b;
        }
        header {
            background-color: #d7b49e;
            padding: 1rem;
            text-align: center;
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        footer {
            background-color: #d7b49e;
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
            color: white;
        }
        .container {
            background-color: #fffaf4;
            border-radius: 15px;
            padding: 2rem;
            margin-top: 2rem;
            box-shadow: 0 0 10px rgba(90, 62, 43, 0.1);
        }
        a, a:hover {
            color: #8b5e3c;
        }
        .btn-primary {
            background-color: #b98563;
            border-color: #b98563;
        }
        .btn-primary:hover {
            background-color: #a46c4d;
            border-color: #a46c4d;
        }
    </style>
</head>
<body>
    <header>
        Sistem Informasi Pelanggan - Flo Bakery 🍞
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        &copy; {{ date('Y') }} Flo Bakery - Cinta Roti, Cinta Kamu
    </footer>
</body>
</html>
