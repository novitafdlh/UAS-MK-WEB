@extends('layouts.dosen')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-gradient-to-br from-rose-50 to-red-50 min-h-screen">
    {{-- Header Section --}}
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-rose-600 to-red-600 bg-clip-text text-transparent mb-2">
                    Daftar Nilai Mahasiswa
                </h1>
                <p class="text-gray-600">Kelola dan pantau nilai mahasiswa</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('dosen.nilai.create') }}" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-rose-500 to-red-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-rose-600 hover:to-red-600 transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Input Nilai
                </a>
            </div>
        </div>
        <div class="w-24 h-1 bg-gradient-to-r from-rose-400 to-red-500 rounded-full mt-4"></div>
    </div>

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl shadow-sm">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-green-800 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if(count($nilaiList) > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 rounded-md shadow-sm">
                <thead class="bg-teal-600 text-white">
                    <tr>
                        <th class="px-6 py-3 border-r border-teal-700 text-left">Mahasiswa</th>
                        <th class="px-6 py-3 border-r border-teal-700 text-left">Mata Kuliah</th>
                        <th class="px-6 py-3 text-left">Nilai</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($nilaiList as $item)
                        <tr class="hover:bg-teal-50 transition">
                            <td class="px-6 py-4 border-r border-gray-300">{{ $item->mahasiswa->name }}</td>
                            <td class="px-6 py-4 border-r border-gray-300">{{ $item->mataKuliah->nama }}</td>
                            <td class="px-6 py-4">{{ $item->nilai ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Footer Info --}}
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-600">
                        Menampilkan <span class="font-medium">{{ count($nilaiList) }}</span> data nilai
                    </div>
                    <div class="text-sm text-gray-500">
                        Total {{ count($nilaiList) }} nilai telah diinput
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-16">
                <div class="mx-auto w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Data Nilai</h3>
                <p class="text-gray-500 mb-6 max-w-md mx-auto">
                    Belum ada nilai yang diinput. Mulai dengan menambahkan nilai mahasiswa pertama.
                </p>
                <a href="{{ route('dosen.nilai.create') }}" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-rose-500 to-red-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-rose-600 hover:to-red-600 transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Input Nilai Pertama
                </a>
            </div>
        @endif
    </div>
</main>
@endsection
