@extends('layouts.app')

@section('title', 'Lamaran Masuk')

@section('content')
    <div class="max-w-5xl mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-4">Lamaran untuk {{ $job->title }}</h2>

        @forelse ($job->applications as $application)
            <div class="bg-white shadow-md rounded p-4 mb-4">
                <p class="font-semibold">Pelamar: {{ $application->user->name }}</p>
                <p>Email: {{ $application->user->email }}</p>
                <p>Status: {{ ucfirst($application->application_status) }}</p>
                @if ($application->user->resume)
                    <a href="{{ asset('storage/' . $application->user->resume) }}" target="_blank"
                        class="text-blue-600 underline">Lihat Resume</a>
                @else
                    <p class="text-red-500">Belum upload resume</p>
                @endif
                <form action="{{ route('applications.updateStatus', $application->id) }}" method="POST" class="mt-2">
                    @csrf
                    @method('PUT')
                    <select name="application_status" class="border rounded px-2 py-1">
                        <option value="pending" @selected($application->application_status === 'pending')>Pending</option>
                        <option value="accepted" @selected($application->application_status === 'accepted')>Diterima</option>
                        <option value="rejected" @selected($application->application_status === 'rejected')>Ditolak</option>
                    </select>
                    <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded ml-2">Update</button>
                </form>
            </div>
        @empty
            <p>Belum ada pelamar untuk lowongan ini.</p>
        @endforelse
    </div>
@endsection
