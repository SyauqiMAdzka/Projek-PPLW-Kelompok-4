<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable = [
        'nama_barang',
        'jumlah_barang',
        'harga_barang',
        'tanggal_masuk',
        'tanggal_keluar',
        'kondisi_barang',
        'id_jenis_barang',
        'id_lokasi_barang'
    ];

    public function pengajuan(){
        return $this->hasMany(Pengajuan::class, 'id_barang');
    }
}
