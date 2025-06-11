@extends('layouts.app')

@section('title', 'Lamaran Saya')

@section('content')
    <div class="max-w-5xl mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-4">Lamaran yang Telah Dikirim</h2>

        @forelse ($applications as $application)
            <div class="bg-white shadow-md rounded p-4 mb-4">
                <h3 class="text-xl font-semibold">{{ $application->job->title }}</h3>
                <p class="text-gray-600">Lokasi: {{ $application->job->location }}</p>
                <p class="text-sm">Status: {{ ucfirst($application->application_status) }}</p>
                <p class="text-sm">Tanggal Lamar: {{ $application->application_date->format('d M Y') }}</p>
                <a href="{{ route('jobs.show', $application->job->id) }}" class="text-blue-500 hover:underline">Lihat
                    Lowongan</a>
            </div>
        @empty
            <p>Anda belum melamar pekerjaan apa pun.</p>
        @endforelse
    </div>
@endsection
