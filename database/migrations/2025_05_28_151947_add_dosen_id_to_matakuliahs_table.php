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
        Schema::table('matakuliahs', function (Blueprint $table) {
            $table->unsignedBigInteger('dosen_id')->nullable()->after('prodi_id');
            $table->foreign('dosen_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('matakuliahs', function (Blueprint $table) {
            $table->dropColumn('dosen_id');
        });
    }
};
