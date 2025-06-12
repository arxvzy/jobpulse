@extends('layouts.app')

@section('title', 'Lowongan Saya')

@section('content')
    <div class="max-w-3xl mx-auto mt-10">
        <x-flash />
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-indigo-700 flex items-center gap-2">
                @include('svg.briefcase') Lowongan Anda
            </h2>
            <a href="{{ route('jobs.create') }}"
                class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                + Tambah Lowongan
            </a>
        </div>

        @forelse ($jobs as $job)
            <div class="bg-white shadow-lg rounded-lg p-6 mb-6 border border-gray-100">
                <div class="flex items-center gap-2 mb-2">
                    @include('svg.briefcase')
                    <h3 class="text-2xl font-bold text-gray-900">{{ $job->title }}</h3>
                </div>

                <p class="text-gray-500 font-medium flex items-center gap-1">
                    @include('svg.map-pin') {{ $job->location }}
                </p>

                <p class="text-gray-500 font-medium flex items-center gap-1">
                    @include('svg.clock') {{ $job->job_type }}
                </p>

                <p class="text-gray-500 font-medium flex items-center gap-1">
                    @include('svg.currency-dollar') Rp{{ number_format($job->salary, 0, ',', '.') }}
                </p>

                <p class="text-sm text-gray-400 mt-2 flex items-center gap-1 italic">
                    @include('svg.calendar') Diposting {{ $job->created_at->diffForHumans() }}
                </p>

                <p class="text-sm text-gray-600 mt-2">
                    <strong>Status:</strong>
                    <span class="{{ $job->status === 'aktif' ? 'text-red-500' : 'text-green-600' }}">
                        {{ ucfirst($job->status) }}
                    </span>
                    | <strong>Pelamar:</strong> {{ $job->applications->count() }}
                </p>

                <div class="mt-4 flex gap-4 flex-wrap items-center">
                    <a href="{{ route('applications.byJob', $job->id) }}"
                        class="inline-flex items-center gap-1 text-indigo-600 hover:underline text-sm font-medium">
                        @include('svg.eye') Lihat Pelamar
                    </a>

                    <a href="{{ route('jobs.edit', $job->id) }}"
                        class="inline-flex items-center gap-1 text-yellow-600 hover:underline text-sm font-medium">
                        @include('svg.pencil-square') Edit
                    </a>

                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus lowongan ini?');" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-flex items-center gap-1 text-red-600 hover:underline text-sm font-medium">
                            @include('svg.trash') Hapus
                        </button>
                    </form>
                </div>


            </div>
        @empty
            <div class="text-center text-gray-500 mt-20">
                <p class="text-lg">Anda belum membuat lowongan pekerjaan.</p>
            </div>
        @endforelse
    </div>
@endsection
