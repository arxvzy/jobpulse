@extends('layouts.app')

@section('title', 'Lowongan Saya')

@section('content')
    <div class="max-w-5xl mx-auto mt-10">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Lowongan yang Anda Buat</h2>
            <a href="{{ route('jobs.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">+ Tambah
                Lowongan</a>
        </div>

        @foreach ($jobs as $job)
            <div class="bg-white shadow-md rounded p-4 mb-4">
                <h3 class="text-xl font-semibold">{{ $job->title }}</h3>
                <p class="text-gray-600">Status: {{ ucfirst($job->status) }}</p>
                <p class="text-sm">Jumlah Pelamar: {{ $job->applications->count() }}</p>

                <div class="mt-2 flex gap-2">
                    <a href="{{ route('applications.byJob', $job->id) }}" class="text-blue-500 hover:underline">Lihat
                        Pelamar</a>
                    <a href="{{ route('jobs.edit', $job->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus lowongan ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
