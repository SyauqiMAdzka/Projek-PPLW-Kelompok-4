@extends('layouts.app')

@section('judul', 'Tambah Barang Baru')

@section('konten')
    <h2>Tambah Data Barang</h2>
    <a href="{{ route('barang.index') }}">← Kembali ke Daftar Barang</a>
    <br><br>

    <form action="{{ route('barang.store') }}" method="POST" style="background: #f9f9f9; padding: 20px; border: 1px solid #ccc;">
        <!-- Token CSRF wajib ada pada form Laravel untuk keamanan -->
        @csrf 
        
        <div style="margin-bottom: 15px;">
            <label>Kode Barang:</label><br>
            <input type="text" name="kode_barang" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label>Nama Barang:</label><br>
            <input type="text" name="nama_barang" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label>Stok Awal:</label><br>
            <input type="number" name="stok" min="0" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label>Kondisi:</label><br>
            <select name="kondisi" required style="width: 100%; padding: 8px;">
                <option value="Baru">Baru</option>
                <option value="Bekas - Baik">Bekas - Baik</option>
                <option value="Rusak">Rusak</option>
            </select>
        </div>
        <button type="submit" style="padding: 10px 20px; background: #333; color: #fff; border: none; cursor: pointer;">Simpan Barang</button>
    </form>
@endsection