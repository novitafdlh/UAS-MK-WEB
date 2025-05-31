@extends('layouts.dosen')

@section('title', 'Jadwal Saya')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6 text-center text-red-700">Jadwal Mengajar</h2>

    <form method="GET" class="mb-6 flex items-center gap-4 justify-end">
        <label for="hari" class="font-medium text-gray-700">Pilih Hari:</label>
        <div class="relative">
            <select name="hari" id="hari" onchange="this.form.submit()"
                class="px-3 py-2 pr-10 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none
                    transition transform duration-200 ease-in-out hover:scale-105 hover:shadow-md">
                <option value="">Semua Hari</option>
                @foreach($daftarHari as $h)
                    <option value="{{ $h }}" {{ $hari == $h ? 'selected' : '' }}>{{ $h }}</option>
                @endforeach
            </select>
            <!-- Ikon panah dropdown -->
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-600">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>
        </div>
    </form>


    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-rose-100 text-black font-semibold">
                <tr>
                    <th class="px-4 py-3 text-left">Mata Kuliah</th>
                    <th class="px-4 py-3 text-left">Jurusan</th>
                    <th class="px-4 py-3 text-left">Prodi</th>
                    <th class="px-4 py-3 text-left">Hari</th>
                    <th class="px-4 py-3 text-left">Jam</th>
                    <th class="px-4 py-3 text-left">Ruangan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($jadwals as $jadwal)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $jadwal->mata_kuliah->nama ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $jadwal->jurusan->nama ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $jadwal->prodi->nama ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $jadwal->hari }}</td>
                        <td class="px-4 py-3">{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
                        <td class="px-4 py-3">{{ $jadwal->ruangan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 py-6">Tidak ada jadwal mengajar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
