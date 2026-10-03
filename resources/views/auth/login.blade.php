@extends('layouts.app')

@section('judul', 'Login - Sistem Inventaris')

@section('konten')
    <h2>Login Sistem</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required>
        </div>
        <br>
        <div>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required>
        </div>
        <br>
        <button type="submit">Login</button>
        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
    </form>
@endsection