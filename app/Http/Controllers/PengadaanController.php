<?php
namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengadaanController extends Controller
{
    // Menampilkan daftar riwayat pengadaan
    public function index()
    {
        // Jika Admin, lihat semua data. Jika Staff, lihat datanya sendiri.
        if (Auth::user()->role->nama_role == 'Admin') {
            $pengadaan = Pengadaan::with(['user', 'barang'])->get();
        } else {
            $pengadaan = Pengadaan::with(['user', 'barang'])->where('user_id', Auth::id())->get();
        }
        
        return view('pengadaan.index', compact('pengadaan'));
    }

    // Form pengajuan pengadaan (Staff)
    public function create()
    {
        if (Auth::user()->role->nama_role !== 'Staff') {
            return redirect()->route('pengadaan.index')->withErrors('Akses Ditolak: Admin tidak perlu mengajukan barang.');
        }
        $barang = Barang::all();
        return view('pengadaan.create', compact('barang'));
    }

    // Menyimpan pengajuan baru
    public function store(Request $request)
    {
        if (Auth::user()->role->nama_role !== 'Staff') {
            return redirect()->route('pengadaan.index')->withErrors('Akses Ditolak: Admin tidak perlu mengajukan barang.');
        }
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'jumlah' => 'required|integer|min:1',
            'alasan' => 'required|string'
        ]);

        Pengadaan::create([
            'user_id' => Auth::id(),
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'alasan' => $request->alasan,
            'status' => 'pending' 
        ]);

        return redirect()->route('pengadaan.index')->with('success', 'Pengajuan berhasil dikirim.');
    }

    // Fungsi khusus Admin: Setujui dan tambah stok
    public function approve($id)
    {
        $pengadaan = Pengadaan::findOrFail($id);
        
        if ($pengadaan->status == 'pending') {
            $pengadaan->update(['status' => 'approved']);
            
            // Tambah stok ke tabel barang
            $barang = Barang::findOrFail($pengadaan->barang_id);
            $barang->increment('stok', $pengadaan->jumlah);
        }

        return redirect()->route('pengadaan.index')->with('success', 'Pengajuan disetujui. Stok otomatis bertambah.');
    }

    // Fungsi khusus Admin: Tolak
    public function reject($id)
    {
        $pengadaan = Pengadaan::findOrFail($id);
        
        if ($pengadaan->status == 'pending') {
            $pengadaan->update(['status' => 'rejected']);
        }

        return redirect()->route('pengadaan.index')->with('success', 'Pengajuan ditolak.');
    }
}