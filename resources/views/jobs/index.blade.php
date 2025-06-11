@extends('layouts.app')

@section('title', 'Lowongan Tersedia')

@section('content')
    <div class="max-w-5xl mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-4">Daftar Lowongan Pekerjaan</h2>

        @foreach ($jobs as $job)
            <div class="bg-white shadow-md rounded p-4 mb-4">
                <h3 class="text-xl font-semibold">{{ $job->title }}</h3>
                <p class="text-gray-600">{{ $job->location }} | {{ $job->job_type }}</p>
                <p class="text-sm mt-1">Gaji: Rp{{ number_format($job->salary, 0, ',', '.') }}</p>
                <a href="{{ route('jobs.show', $job->id) }}" class="text-blue-500 hover:underline mt-2 inline-block">Lihat
                    Detail</a>
            </div>
        @endforeach
    </div>
@endsection
