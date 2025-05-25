@extends('layouts.mahasiswa')

@section('title', 'Dashboard')

@section('content')
    <p>Selamat datang di dashboard mahasiswa, {{ auth()->user()->name }}!</p>
@endsection
