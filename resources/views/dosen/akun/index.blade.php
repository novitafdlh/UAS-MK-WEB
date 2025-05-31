@extends('layouts.dosen')

@section('title', 'Profil Dosen')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Profil Dosen</h2>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif
    <div class="space-y-4">
        <div>
            <span class="font-semibold text-gray-700">Nama:</span>
            <span class="ml-2">{{ $dosen->name }}</span>
        </div>
        <div>
            <span class="font-semibold text-gray-700">NIDN:</span>
            <span class="ml-2">{{ $dosen->nidn }}</span>
        </div>
        <div>
            <span class="font-semibold text-gray-700">Email:</span>
            <span class="ml-2">{{ $dosen->email }}</span>
        </div>
        <div>
            <span class="font-semibold text-gray-700">Jurusan:</span>
            <span class="ml-2">{{ optional($dosen->jurusan)->nama ?? '-' }}</span>
        </div>
        <div>
            <span class="font-semibold text-gray-700">Prodi:</span>
            <span class="ml-2">{{ optional($dosen->prodi)->nama ?? '-' }}</span>
        </div>
    </div>
    <div class="flex justify-end mt-8">
        <a href="{{ route('dosen.akun.edit') }}"
           class="bg-red-500 hover:bg-red-800 text-white font-semibold px-6 py-2 rounded-lg shadow transition">
            Edit Profil
        </a>
    </div>
</div>
@endsection