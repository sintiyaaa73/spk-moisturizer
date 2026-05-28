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
        Schema::create('pembobotan_ahp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sub_kriteria')->constrained('sub_kriteria')->onDelete('cascade');
            $table->float('bobot_lokal');
            $table->float('bobot_global');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembobotan_ahp');
    }
};
