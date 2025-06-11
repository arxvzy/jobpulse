@extends('layouts.app')

@section('title', 'Detail Lowongan')

@section('content')

    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <a href="{{ route('jobs.index') }}" class="text-blue-500 hover:underline mb-4 inline-block">← Kembali ke Daftar
            Lowongan</a>
        <h2 class="text-2xl font-bold mb-4">{{ $job->title }}</h2>
        <p><strong>Perusahaan:</strong> {{ $job->user->company_name }}</p>
        <p><strong>Lokasi:</strong> {{ $job->location }}</p>
        <p><strong>Jenis:</strong> {{ $job->job_type }}</p>
        <p><strong>Gaji:</strong> Rp{{ number_format($job->salary, 0, ',', '.') }}</p>
        <p><strong>Status:</strong> {{ ucfirst($job->status) }}</p>

        <div class="mt-4">
            <h3 class="text-lg font-semibold mb-2">Deskripsi Pekerjaan</h3>
            <p>{{ $job->description }}</p>
        </div>

        @if (Auth::check() && Auth::user()->role === 'user')
            @if (!$alreadyApplied)
                <form action="{{ route('applications.store') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="job_id" value="{{ $job->id }}">

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Lamar Pekerjaan Ini
                    </button>
                </form>
            @else
                <p class="mt-4 text-gray-500 italic">Kamu sudah melamar pekerjaan ini.</p>
            @endif
        @else
            <a href="{{ route('login') }}"
                class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Login untuk melamar pekerjaan ini
            </a>
        @endif

        @if (session('success'))
            <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                {{ session('error') }}
            </div>
        @endif

    </div>
@endsection
