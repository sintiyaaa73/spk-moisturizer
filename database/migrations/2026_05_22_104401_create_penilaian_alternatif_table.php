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
        Schema::create('penilaian_alternatif', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_alternatif')->constrained('alternatif')->onDelete('cascade');
            $table->foreignId('id_sub_kriteria')->constrained('sub_kriteria')->onDelete('cascade');
            $table->float('nilai', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian_alternatif');
    }
};
