@extends('layouts.app')

@section('judul', 'Riwayat Pengadaan')

@section('konten')
    <h2>Daftar Pengajuan Pengadaan</h2>

    <!-- Logika: Tombol Ajukan HANYA muncul jika role adalah Staff -->
    @if(auth()->user()->role->nama_role == 'Staff')
        <a href="{{ route('pengadaan.create') }}" style="display:inline-block; margin-bottom:15px; padding:8px 12px; background:blue; color:white; text-decoration:none;">+ Ajukan Pengadaan Baru</a>
    @endif

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%;">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Pemohon</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Alasan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengadaan as $item)
                <tr>
                    <!-- Menampilkan tanggal pengajuan -->
                    <td>{{ $item->created_at->format('d M Y') }}</td>
                    <!-- Memanggil relasi tabel user dan barang -->
                    <td>{{ $item->user->nama }}</td>
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->alasan }}</td>
                    <td>
                         <!-- Tampilkan status -->
                        <strong style="color: {{ $item->status == 'approved' ? 'green' : ($item->status == 'rejected' ? 'red' : 'orange') }};">
                            {{ strtoupper($item->status) }}
                        </strong>

                        <!-- Tampilkan tombol Aksi HANYA untuk Admin dan jika status masih pending -->
                        @if(auth()->user()->role->nama_role == 'Admin' && $item->status == 'pending')
                            <div style="margin-top: 10px;">
                                <form action="{{ route('pengadaan.approve', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" style="background: green; color: white; border: none; padding: 5px; cursor: pointer;">Setujui</button>
                                </form>

                                <form action="{{ route('pengadaan.reject', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" style="background: red; color: white; border: none; padding: 5px; cursor: pointer;">Tolak</button>
                                </form>
                            </div>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;">Belum ada riwayat pengajuan pengadaan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection