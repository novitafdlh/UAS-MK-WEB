<h1>Dashboard Mahasiswa</h1>
<p>Selamat datang, {{ auth()->user()->name }}</p>

<!-- Tombol Log Out -->
<form method="POST" action="{{ route('logout') }}" class="mt-4">
    @csrf
    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
        Log Out
    </button>
</form>
