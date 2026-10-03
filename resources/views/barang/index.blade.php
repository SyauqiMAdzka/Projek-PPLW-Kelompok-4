@extends('layouts.app')

@section('judul', 'Daftar Barang')

@section('konten')
    <h2>Daftar Barang Inventaris</h2>
    
    <!-- Logika: Tombol Tambah HANYA muncul jika role adalah Admin -->
    @if(auth()->user()->role->nama_role == 'Admin')
        <a href="{{ route('barang.create') }}" style="display:inline-block; margin-bottom:15px; padding:8px 12px; background:blue; color:white; text-decoration:none;">+ Tambah Barang Baru</a>
    @endif

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%;">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Kondisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($barang as $item)
                <tr>
                    <td>{{ $item->kode_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>{{ $item->kondisi }}</td>
                    <td>
                        @if(auth()->user()->role->nama_role == 'Admin')
                            <a href="{{ route('barang.edit', $item->id) }}" style="color: blue;">Edit</a> | 
                            <form action="{{ route('barang.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: red; text-decoration: underline; cursor: pointer;" onclick="return confirm('Yakin hapus barang ini?')">Hapus</button>
                            </form>
                        @else
                            <span>- (Hanya Admin)</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;">Data barang belum tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection