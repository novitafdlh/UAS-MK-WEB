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
        Schema::table('krs', function (Blueprint $table) {
            // Pastikan kolom jadwal_id sudah ada dan bertipe unsignedBigInteger
            $table->unsignedBigInteger('jadwal_id')->change();
            $table->foreign('jadwal_id')->references('id')->on('jadwals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('krs', function (Blueprint $table) {
            $table->dropForeign(['jadwal_id']);
        });
    }
};
