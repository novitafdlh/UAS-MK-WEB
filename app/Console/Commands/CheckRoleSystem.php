<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class CheckRoleSystem extends Command
{
    protected $signature = 'check:role-system';
    protected $description = 'Cek apakah sistem menggunakan Spatie Role/Permission atau hanya enum role di tabel users';

    public function handle()
    {
        $this->info('🔍 Mengecek struktur role system...');

        $usersTableHasRoleEnum = Schema::hasColumn('users', 'role');
        $spatieTables = [
            'roles',
            'permissions',
            'model_has_roles',
            'model_has_permissions',
            'role_has_permissions'
        ];

        $existingSpatieTables = collect($spatieTables)->filter(fn($table) => Schema::hasTable($table));

        if ($usersTableHasRoleEnum) {
            $this->info('✅ Kolom "role" ada di tabel users (enum).');
        } else {
            $this->warn('⚠️ Kolom "role" TIDAK ditemukan di tabel users.');
        }

        if ($existingSpatieTables->count() === count($spatieTables)) {
            $this->info('✅ Semua tabel Spatie Permission ditemukan:');
            $existingSpatieTables->each(fn($table) => $this->line(" - $table"));
        } elseif ($existingSpatieTables->isNotEmpty()) {
            $this->warn('⚠️ Sebagian tabel Spatie ditemukan:');
            $existingSpatieTables->each(fn($table) => $this->line(" - $table"));
        } else {
            $this->info('❌ Tidak ditemukan tabel Spatie Permission.');
        }

        // Tambahan: Cek apakah trait HasRoles digunakan di model User
        $userModelPath = app_path('Models/User.php');
        if (file_exists($userModelPath)) {
            $userModelContent = file_get_contents($userModelPath);
            if (str_contains($userModelContent, 'HasRoles')) {
                $this->info('✅ Model User menggunakan trait HasRoles.');
            } else {
                $this->warn('⚠️ Model User TIDAK menggunakan trait HasRoles.');
            }
        } else {
            $this->error('❌ File model User.php tidak ditemukan.');
        }

        return 0;
    }
}
