@extends('layouts.app')

@section('title', 'Edit Lowongan')

@section('content')
    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Edit Lowongan</h2>

        <form action="{{ route('jobs.update', $job->id) }}" method="POST">
            @csrf
            @method('PUT')

            <x-job-form :job="$job" />
        </form>
    </div>
@endsection
