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
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('nama', 255);
        $table->string('email', 200)->unique();
        // Kolom password menggunakan ukuran panjang karena akan menyimpan hash, bukan password asli
        $table->string('password', 300); 
        $table->foreignId('role_id')->constrained('roles')->onDelete('restrict');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('users');
    }
};
