<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('admin.barang.index', compact('barang'));
    }

    public function store(Request $request){
        $request->validate([
            'nama_barang' => 'required',
            'jumlah_barang' => 'required|integer',
            'harga_barang' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date',
            'kondisi_barang' => 'required',
            'id_jenis_barang' => 'required|exists:jenis_barang,id',
            'id_lokasi_barang' => 'required|exists:lokasi_barang,id'
        ]);

        Barang::create($request->all());

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil ditambahkan.');


    }
    public function destroy($id){
            $barang = Barang::findOrFail($id);
            $barang->delete();
            return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil dihapus.');
        }
}
