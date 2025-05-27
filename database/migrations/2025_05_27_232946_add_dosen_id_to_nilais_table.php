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
        Schema::table('nilai', function (Blueprint $table) {
            $table->unsignedBigInteger('dosen_id')->nullable()->after('mahasiswa_id');
            $table->foreign('dosen_id')->references('id')->on('dosens')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nilai', function (Blueprint $table) {
            $table->dropForeign(['dosen_id']);
            $table->dropColumn('dosen_id');
        });
    }
};
