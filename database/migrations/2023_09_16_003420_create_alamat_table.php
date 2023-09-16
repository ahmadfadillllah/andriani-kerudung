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
        Schema::create('alamat', function (Blueprint $table) {
            $table->id();
            $table->integer('provinsi_id')->nullable();
            $table->integer('kota_id')->nullable();
            $table->integer('kecamatan_id')->nullable();
            $table->integer('kelurahan_id')->nullable();
            $table->string('alamat')->nullable();
            $table->foreignId('users_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamat');
    }
};
