@extends('layouts.dosen')

@section('title', 'Jadwal Saya')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Jadwal Mengajar</h2>
    
    <form method="GET" class="mb-6 flex items-center gap-2">
        <label for="hari" class="font-semibold">Pilih Hari:</label>
        <select name="hari" id="hari" onchange="this.form.submit()" class="border rounded px-3 py-2">
            <option value="">Semua Hari</option>
            @foreach($daftarHari as $h)
                <option value="{{ $h }}" {{ $hari == $h ? 'selected' : '' }}>{{ $h }}</option>
            @endforeach
        </select>
    </form>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="px-4 py-2">Mata Kuliah</th>
                <th class="px-4 py-2">Jurusan</th>
                <th class="px-4 py-2">Prodi</th>
                <th class="px-4 py-2">Hari</th>
                <th class="px-4 py-2">Jam</th>
                <th class="px-4 py-2">Ruangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jadwals as $jadwal)
            <tr>
                <td class="px-4 py-2">{{ $jadwal->mata_kuliah->nama ?? '-' }}</td>
                <td class="px-4 py-2">{{ $jadwal->jurusan->nama ?? '-' }}</td>
                <td class="px-4 py-2">{{ $jadwal->prodi->nama ?? '-' }}</td>
                <td class="px-4 py-2">{{ $jadwal->hari }}</td>
                <td class="px-4 py-2">{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
                <td class="px-4 py-2">{{ $jadwal->ruangan }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center py-4">Tidak ada jadwal.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection