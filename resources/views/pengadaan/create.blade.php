@extends('layouts.app')

@section('judul', 'Form Pengadaan Barang')

@section('konten')
    <h2>Ajukan Pengadaan Barang</h2>
    <a href="{{ route('pengadaan.index') }}">← Kembali ke Riwayat Pengadaan</a>
    <br><br>

    <form action="{{ route('pengadaan.store') }}" method="POST" style="background: #f9f9f9; padding: 20px; border: 1px solid #ccc;">
        @csrf
        
        <div style="margin-bottom: 15px;">
            <label>Pilih Barang:</label><br>
            <select name="barang_id" required style="width: 100%; padding: 8px;">
                <option value="">-- Pilih Barang dari Gudang --</option>
                <!-- Looping data barang dari Controller -->
                @foreach($barang as $b)
                    <option value="{{ $b->id }}">{{ $b->kode_barang }} - {{ $b->nama_barang }} (Stok: {{ $b->stok }})</option>
                @endforeach
            </select>
        </div>
        <div style="margin-bottom: 15px;">
            <label>Jumlah Permintaan:</label><br>
            <input type="number" name="jumlah" min="1" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label>Alasan Pengadaan:</label><br>
            <textarea name="alasan" rows="4" required style="width: 100%; padding: 8px;"></textarea>
        </div>
        <button type="submit" style="padding: 10px 20px; background: #333; color: #fff; border: none; cursor: pointer;">Kirim Pengajuan</button>
    </form>
@endsection