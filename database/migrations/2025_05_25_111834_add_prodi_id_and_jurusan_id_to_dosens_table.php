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
        Schema::table('dosens', function (Blueprint $table) {
            // Hapus kolom 'jurusan' jika sudah ada sebagai string dan Anda ingin menggantinya dengan foreign key
            // Pastikan Anda telah memigrasikan data lama jika diperlukan!
            // $table->dropColumn('jurusan'); // Uncomment baris ini jika Anda ingin menghapus kolom string 'jurusan'

            $table->foreignId('prodi_id')->nullable()->constrained('prodis')->onDelete('set null');
            $table->foreignId('jurusan_id')->nullable()->constrained('jurusans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dosens', function (Blueprint $table) {
            $table->dropConstrainedForeignId('prodi_id');
            $table->dropConstrainedForeignId('jurusan_id');
            // Jika Anda menghapus kolom 'jurusan' di atas, Anda mungkin ingin menambahkannya kembali di sini jika diperlukan rollback
            // $table->string('jurusan')->nullable();
        });
    }
};