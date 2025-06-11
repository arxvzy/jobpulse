@extends('layouts.app')

@section('title', 'Tambah Lowongan')

@section('content')

    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Form Tambah Lowongan</h2>

        <form action="{{ route('jobs.store') }}" method="POST">
            @csrf

            <x-job-form :job="null" />
        </form>

    </div>
@endsection
