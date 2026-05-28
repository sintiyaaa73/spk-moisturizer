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
        Schema::create('perhitungan_saw', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_alternatif')->constrained('alternatif')->onDelete('cascade');
            $table->float('nilai_normalisasi', 10, 2)->nullable();
            $table->float('nilai_akhir', 10, 2)->nullable();
            $table->integer('ranking')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perhitungan_saw');
    }
};
