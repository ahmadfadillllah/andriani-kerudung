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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->foreignId('users_id')->constrained('users')->cascadeOnDelete();
            $table->boolean('statusenabled');
            $table->foreignId('produk_id')->constrained('produk')->cascadeOnDelete();
            $table->integer('jumlah')->nullable();
            $table->string('cara_bayar')->nullable();
            $table->string('catatan')->nullable();
            $table->bigInteger('subtotal')->nullable();
            $table->bigInteger('diskon')->nullable();
            $table->bigInteger('ongkoskirim')->nullable();
            $table->string('namakurir')->nullable();
            $table->bigInteger('total')->nullable();
            $table->string('statuspembayaran')->nullable();
            $table->string('statuspengiriman')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
