@extends('layouts.app')

@section('title', 'Detail Lowongan')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg border border-gray-100">
        <a href="{{ url()->previous() }}"
            class="inline-flex items-center bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition mb-4 gap-2">
            @include('svg.arrow-left')
            Kembali
        </a>



        <div class="flex items-center gap-2 mb-4">
            @include('svg.briefcase')
            <h2 class="text-2xl font-bold text-gray-900">{{ $job->title }}</h2>
        </div>

        <div class="text-sm text-gray-700 space-y-2">
            <p class="flex items-center gap-1">
                @include('svg.building-office-2')
                <strong>Perusahaan:</strong> {{ $job->user->company_name }}
            </p>
            <p class="flex items-center gap-1">
                @include('svg.map-pin2')
                <strong>Lokasi:</strong> {{ $job->location }}
            </p>
            <p class="flex items-center gap-1">
                @include('svg.clock2')
                <strong>Tipe:</strong> {{ $job->job_type }}
            </p>
            <p class="flex items-center gap-1">
                @include('svg.currency-dollar2')
                <strong>Gaji:</strong> Rp{{ number_format($job->salary, 0, ',', '.') }}
            </p>
            <p class="flex items-center gap-1">
                @include('svg.calendar')
                <strong>Diposting:</strong> {{ $job->created_at->diffForHumans() }}
            </p>
            <p class="flex items-center gap-1">
                @include('svg.status')
                <strong>Status:</strong>
                <span class="font-medium {{ $job->status === 'open' ? 'text-green-600' : 'text-red-600' }}">
                    {{ ucfirst($job->status) }}
                </span>
            </p>
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-semibold mb-2">Deskripsi Pekerjaan</h3>
            <p class="text-gray-700">{{ $job->description }}</p>
        </div>

        @auth
            @if (Auth::user()->role === 'user')
                @if (!$alreadyApplied)
                    <form action="{{ route('applications.store') }}" method="POST" class="mt-6">
                        @csrf
                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
                            Lamar Pekerjaan Ini
                        </button>
                    </form>
                @else
                    <p class="mt-6 text-gray-500 italic">Kamu sudah melamar pekerjaan ini.</p>
                @endif
            @endif
        @else
            <a href="{{ route('login') }}"
                class="mt-6 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 cursor-pointer">
                Login untuk melamar pekerjaan ini
            </a>
        @endauth

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
