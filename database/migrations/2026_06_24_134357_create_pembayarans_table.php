<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
    $table->id();

    $table->foreignId('warga_id')
          ->constrained('wargas')
          ->onDelete('cascade');

    $table->foreignId('iuran_id')
          ->constrained('iurans')
          ->onDelete('cascade');

    $table->date('tanggal_bayar')->nullable();

    $table->enum('metode_pembayaran', [
        'cash',
        'qris'
    ]);

    $table->enum('status', [
        'belum_bayar',
        'lunas'
    ])->default('belum_bayar');

    $table->string('bukti_pembayaran')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
