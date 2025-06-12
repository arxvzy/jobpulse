@extends('layouts.app')

@section('title', 'Tambah Lowongan')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg border border-gray-100">
        <h2 class="text-2xl font-bold mb-6 text-indigo-700 flex items-center gap-2">
            Tambah Lowongan Baru
        </h2>

        <form action="{{ route('jobs.store') }}" method="POST" class="space-y-6">
            @csrf
            <x-job-form :job="null" />
        </form>
    </div>
@endsection
