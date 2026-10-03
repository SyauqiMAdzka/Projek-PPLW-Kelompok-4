<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('judul', 'Sistem Inventaris')</title>
    <!-- Kamu bisa menambahkan CSS framework seperti Bootstrap di sini -->
    <style>
        body { font-family: sans-serif; background-color: #f4f4f4; margin: 0; }
        .container { max-width: 960px; margin: 20px auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        nav { background: #333; color: white; padding: 10px; }
        nav a { color: white; text-decoration: none; margin-right: 15px; }
        .alert { padding: 10px; margin-bottom: 15px; border-radius: 4px; }
        .alert-success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-danger { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>
    @auth
        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('barang.index') }}">Barang</a>
            <a href="{{ route('pengadaan.index') }}">Pengadaan</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline; float:right;">
                @csrf
                <button type="submit" style="background:none; border:none; color:white; cursor:pointer;">Logout ({{ auth()->user()->nama }})</button>
            </form>
        </nav>
    @endauth

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('konten')
    </div>
</body>
</html>