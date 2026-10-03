<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';
    protected $fillable = [
        'staff_id',
        'barang_id',
        'jumlah',
        'alasan',
        'status'
    ];

    public function staff(){
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function barang(){
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
