@extends('layouts.app')

@section('judul', 'Registrasi Pengguna')

@section('konten')
    <h2>Registrasi Sistem Inventaris</h2>
    <form action="{{ route('register') }}" method="POST" style="background: #f9f9f9; padding: 20px; border: 1px solid #ccc;">
        @csrf
        
        <div style="margin-bottom: 15px;">
            <label>Nama Lengkap:</label><br>
            <input type="text" name="nama" required style="width: 100%; padding: 8px;" value="{{ old('nama') }}">
        </div>
        
        <div style="margin-bottom: 15px;">
            <label>Email:</label><br>
            <input type="email" name="email" required style="width: 100%; padding: 8px;" value="{{ old('email') }}">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Pilih Role:</label><br>
            <select name="role_id" required style="width: 100%; padding: 8px;">
                <option value="">-- Pilih Role --</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->nama_role }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Password:</label><br>
            <input type="password" name="password" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Konfirmasi Password:</label><br>
            <input type="password" name="password_confirmation" required style="width: 100%; padding: 8px;">
        </div>

        <button type="submit" style="padding: 10px 20px; background: #333; color: #fff; border: none;">Daftar</button>
        <p style="margin-top: 15px;">Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
    </form>
@endsection