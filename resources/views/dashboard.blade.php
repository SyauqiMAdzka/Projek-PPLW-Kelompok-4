@extends('layouts.app')

@section('judul', 'Dashboard')

@section('konten')
    <h2>Selamat Datang, {{ auth()->user()->nama }}</h2>
    <p>Email: {{ auth()->user()->email }}</p>
    <p>Role Anda saat ini: <strong>{{ auth()->user()->role->nama_role }}</strong></p>
    <hr>

    <h3>Menu Akses Cepat:</h3>
    <ul>
        @if(auth()->user()->role->nama_role == 'Admin')
            <!-- Menu khusus Admin -->
            <li><a href="{{ route('barang.index') }}">Manajemen Data Barang (CRUD)</a></li>
            <li><a href="{{ route('pengadaan.index') }}">Daftar Seluruh Pengajuan (Approval)</a></li>
        @elseif(auth()->user()->role->nama_role == 'Staff')
            <!-- Menu khusus Staff -->
            <li><a href="{{ route('barang.index') }}">Lihat Ketersediaan Barang</a></li>
            <li><a href="{{ route('pengadaan.create') }}">Ajukan Form Pengadaan Baru</a></li>
            <li><a href="{{ route('pengadaan.index') }}">Riwayat Pengajuan Saya</a></li>
        @endif
    </ul>
@endsection