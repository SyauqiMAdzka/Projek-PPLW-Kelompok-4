<?php

namespace App\Http\Controllers;

use illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\Barang;

class PengajuanController extends Controller
{
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'staff_id' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barang,id',
            'jumlah' => 'required|integer|min:1',
            'alasan' => 'required|string',
        ]);

        Pengajuan::create([
            'staff_id' => Auth::id(),
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'alasan' => $request->alasan,
            'status' => 'pending',
        ]);

        return redirect()->route('staff.pengajuan.index')->with('success', 'Pengajuan berhasil dikirim, menunggu persetujuan admin.');
    }

    public function approve($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        if ($pengajuan->status !== 'pending') {
            return back()->with('error', 'Pengajuan sudah diproses sebelumnya.');
        }

        $pengajuan->status = 'Disetujui';
        $pengajuan->save();

        $barang = Barang::findOrFail($pengajuan->barang_id);
        $barang->stokk += $pengajuan->jumlah;
        $barang->save();

        return back()->with('success', 'Pengajuan disetujui dan stok ditambahkan.');
    }

    public function reject($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'Ditolak';
        $pengajuan->save();

        return back()->with('success', 'Pengajuan ditolak.');
    }
}
