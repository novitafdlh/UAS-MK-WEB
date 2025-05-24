@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Daftar Akun Dosen</h1>

    <a href="{{ route('admin.dosen.akun.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Tambah Akun Dosen
    </a>

    <table class="w-full bg-white shadow rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Role</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dosenUsers as $user)
            <tr>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2">
                    {{ $user->getRoleNames()->first() ?? '-' }}
                </td>
                <td class="border px-4 py-2 flex gap-2">
                    <a href="{{ route('admin.dosen.akun.edit', $user->id) }}" class="px-2 py-1 bg-yellow-400 rounded hover:bg-yellow-500">Edit</a>

                    <form action="{{ route('admin.dosen.akun.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus akun ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="border px-4 py-2 text-center">Belum ada akun dosen.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
