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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenisproduk_id');
            $table->foreignId('users_id')->constrained('users')->cascadeOnDelete();
            $table->boolean('statusenabled');
            $table->string('nama')->nullable();
            $table->integer('stok')->nullable();
            $table->bigInteger('harga')->nullable();
            $table->bigInteger('hargaasli')->nullable();
            $table->string('warna')->nullable();
            $table->string('berat')->nullable();
            $table->string('gambar1')->nullable();
            $table->string('gambar2')->nullable();
            $table->string('gambar3')->nullable();
            $table->string('gambar4')->nullable();
            $table->integer('bundle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
