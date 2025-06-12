@extends('layouts.app')

@section('title', 'Lamaran Masuk')

@section('content')
    <div class="max-w-3xl mx-auto mt-10">
        @if (session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                {{ session('error') }}
            </div>
        @endif
        <h2 class="text-2xl font-bold mb-6">Lamaran untuk <a target="_blank" href="{{ route('jobs.show', $job->id) }}"
                class="text-indigo-700 hover:underline">{{ $job->title }}</a></h2>

        @forelse ($job->applications as $application)
            <div class="bg-white shadow-lg rounded-lg p-6 mb-6 border border-gray-100">
                <div class="mb-3">
                    <p class="flex items-center gap-2 text-gray-700 font-medium">
                        @include('svg.user')
                        <span>Pelamar: {{ $application->user->name }}</span>
                    </p>
                    <p class="flex items-center gap-2 text-gray-600 text-sm mt-1">
                        @include('svg.mail')
                        <span>Email: {{ $application->user->email }}</span>
                    </p>
                    <p class="flex items-center gap-2 text-gray-600 text-sm mt-1">
                        @include('svg.adjustments-horizontal')
                        <span>Status: {{ ucfirst($application->application_status) }}</span>
                    </p>
                </div>

                @if ($application->user->resume)
                    <a href="{{ asset('storage/' . $application->user->resume) }}" target="_blank"
                        class="inline-flex items-center gap-1 text-blue-600 hover:underline text-sm font-medium">
                        @include('svg.clipboard-document') Lihat Resume
                    </a>
                @else
                    <p class="text-sm text-red-500 italic">Belum upload resume</p>
                @endif

                <form action="{{ route('applications.updateStatus', $application->id) }}" method="POST"
                    class="mt-4 flex items-center gap-2 flex-wrap">
                    @csrf
                    @method('PUT')
                    <select name="application_status"
                        class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded px-3 py-1 text-sm">
                        <option value="pending" @selected($application->application_status === 'pending')>Pending</option>
                        <option value="accepted" @selected($application->application_status === 'accepted')>Diterima</option>
                        <option value="rejected" @selected($application->application_status === 'rejected')>Ditolak</option>
                    </select>
                    <button type="submit"
                        class="inline-flex items-center bg-indigo-600 text-white text-sm px-4 py-1.5 rounded hover:bg-indigo-700 transition gap-1">
                        Update
                    </button>
                </form>
            </div>
        @empty
            <p class="text-gray-600">Belum ada pelamar untuk lowongan ini.</p>
        @endforelse
    </div>
@endsection
