@extends('layouts.dosen')

@section('title', 'Jadwal Saya')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-gradient-to-br from-dark-blue-50 to-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto"> {{-- Adjusted max-width for content --}}
        {{-- Header Section --}}
        <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-dark-blue-600 to-red-accent-600 bg-clip-text text-transparent mb-2">
                        Jadwal Mengajar Saya
                    </h1>
                    <p class="text-gray-600">Daftar semua jadwal mata kuliah yang Anda ampu</p>
                </div>
                {{-- No specific action button here based on typical schedule view --}}
            </div>
            <div class="w-24 h-1 bg-gradient-to-r from-dark-blue-400 to-red-accent-500 rounded-full mt-4"></div>
        </div>

        {{-- Filter Section (Inline) --}}
        <div class="mb-8"> {{-- Removed bg-white, shadow, border, p-4, rounded-xl --}}
            <form method="GET" class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="relative flex-grow max-w-xs">
                        <svg class="absolute left-2 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <select name="hari" id="hari" onchange="this.form.submit()"
                            class="w-full pl-9 pr-8 py-2 border border-dark-blue-200 rounded-lg text-sm focus:ring-2 focus:ring-dark-blue-500 focus:outline-none bg-white">
                            <option value="">Semua Hari</option>
                            @foreach($daftarHari as $h)
                                <option value="{{ $h }}" {{ $hari == $h ? 'selected' : '' }}>{{ $h }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>

        {{-- Jadwal Table --}}
        <div class="bg-white rounded-2xl shadow-md border border-dark-blue-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-dark-blue-50 to-red-accent-50">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-dark-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Detail Jadwal Mengajar
                </h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-100 text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Mata Kuliah</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jurusan</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Prodi</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Hari</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jam</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ruangan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($jadwals as $jadwal)
                            <tr class="hover:bg-gradient-to-r hover:from-dark-blue-50 hover:to-red-accent-50 transition-all duration-200">
                                <td class="px-6 py-3">{{ $jadwal->mata_kuliah->nama ?? '-' }}</td>
                                <td class="px-6 py-3">{{ $jadwal->jurusan->nama ?? '-' }}</td>
                                <td class="px-6 py-3">{{ $jadwal->prodi->nama ?? '-' }}</td>
                                <td class="px-6 py-3">{{ $jadwal->hari }}</td>
                                <td class="px-6 py-3">{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
                                <td class="px-6 py-3">{{ $jadwal->ruangan }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-gray-500 py-6">Tidak ada jadwal mengajar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 text-sm text-gray-600">
                Total <span class="font-medium">{{ count($jadwals) }}</span> jadwal ditemukan.
            </div>
        </div>
    </div>
</main>
@endsection