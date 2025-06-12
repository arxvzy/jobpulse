@extends('layouts.app')

@section('title', 'Lamaran Saya')

@section('content')
    <div class="max-w-3xl mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
            @include('svg.clipboard-document') Lamaran yang Telah Dikirim
        </h2>

        @forelse ($applications as $application)
            @php
                $job = $application->job;
            @endphp

            <div class="bg-white shadow-lg rounded-lg p-6 mb-6 border border-gray-100">
                <div class="flex items-center gap-2 mb-1">
                    @include('svg.briefcase')
                    <h3 class="text-2xl font-bold text-gray-900">{{ $job->title }}</h3>
                </div>

                <p class="text-gray-500 font-medium mt-2 flex items-center gap-1">
                    @include('svg.building-office-2')
                    {{ $job->user->company_name }}
                </p>

                <p class="text-gray-500 font-medium mt-2 flex items-center gap-1">
                    @include('svg.map-pin')
                    {{ $job->location }}
                </p>

                <p class="text-gray-500 font-medium mt-2 flex items-center gap-1">
                    @include('svg.clock')
                    {{ $job->job_type }}
                </p>

                <p class="text-gray-500 font-medium mt-2 flex items-center gap-1">
                    @include('svg.currency-dollar')
                    Gaji: Rp{{ number_format($job->salary, 0, ',', '.') }}
                </p>

                <p class="text-gray-400 text-sm mt-2 flex items-center gap-1 italic">
                    @include('svg.calendar')
                    Diposting {{ $job->created_at->diffForHumans() }}
                </p>

                <p class="text-gray-500 text-sm mt-2 flex items-center gap-1">
                    @include('svg.status')
                    <strong>Status Lamaran:</strong> <span
                        class="ml-1">{{ ucfirst($application->application_status) }}</span>
                </p>

                <p class="text-gray-500 text-sm mt-1 flex items-center gap-1">
                    @include('svg.calendar')
                    <strong>Dilamar pada:</strong> <span
                        class="ml-1">{{ $application->application_date->format('d M Y') }}</span>
                </p>

                <div class="mt-4">
                    <a href="{{ route('jobs.show', $job->id) }}"
                        class="inline-flex items-center bg-indigo-600 text-white text-sm px-4 py-2 rounded hover:bg-indigo-700 transition gap-2">
                        @include('svg.eye')
                        Lihat Lowongan
                    </a>
                </div>
            </div>
        @empty
            <div class="bg-white shadow-md rounded-lg p-6 text-center text-gray-500">
                Anda belum melamar pekerjaan apa pun.
            </div>
        @endforelse
    </div>
@endsection
