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
            $table->boolean('statusenabled');
            $table->integer('provinsi')->nullable();
            $table->string('namaprovinsi')->nullable();
            $table->integer('kota')->nullable();
            $table->string('namakota')->nullable();
            $table->string('alamat')->nullable();
            $table->boolean('utama')->nullable();
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
