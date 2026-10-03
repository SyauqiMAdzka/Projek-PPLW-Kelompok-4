<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    protected $table = 'pengadaan';
    protected $fillable = ['user_id', 'barang_id', 'jumlah', 'alasan', 'status'];

    // Relasi ke User dan Barang
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}