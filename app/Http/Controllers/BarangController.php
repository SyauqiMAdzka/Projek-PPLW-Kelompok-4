<?php
namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Menampilkan daftar barang (Staff & Admin)
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    // Form tambah barang (Hanya Admin)
    public function create()
    {
        if (Auth::user()->role->nama_role !== 'Admin') {
            return redirect()->route('barang.index')->withErrors('Akses Ditolak: Hanya Admin yang bisa menambah barang.');
        }
        return view('barang.create');
    }

    // Menyimpan barang baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_barang' => 'required|unique:barang',
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'kondisi' => 'required'
        ]);
        if (Auth::user()->role->nama_role !== 'Admin') {
            return redirect()->route('barang.index')->withErrors('Akses Ditolak.');
        }
        Barang::create($data);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambah');
    }

    // Form edit barang
    public function edit(Barang $barang)
    {
        if (Auth::user()->role->nama_role !== 'Admin') {
            return redirect()->route('barang.index')->withErrors('Akses Ditolak.');
        }
        return view('barang.edit', compact('barang'));
    }

    // Menyimpan perubahan data barang
    public function update(Request $request, Barang $barang)
    {
        $data = $request->validate([
            'kode_barang' => 'required|unique:barang,kode_barang,' . $barang->id,
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'kondisi' => 'required'
        ]);
        if (Auth::user()->role->nama_role !== 'Admin') {
            return redirect()->route('barang.index')->withErrors('Akses Ditolak.');
        }
        $barang->update($data);
        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    // Menghapus barang
    public function destroy(Barang $barang)
    {
        if (Auth::user()->role->nama_role !== 'Admin') {
            return redirect()->route('barang.index')->withErrors('Akses Ditolak.');
        }
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}