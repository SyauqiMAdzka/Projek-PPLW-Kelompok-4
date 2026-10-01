<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up() {
    Schema::create('barang', function (Blueprint $table) {
        $table->id();
        $table->string('kode_barang', 50)->unique();
        $table->string('nama_barang', 255);
        $table->integer('stok')->default(0);
        $table->string('kondisi', 100);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
