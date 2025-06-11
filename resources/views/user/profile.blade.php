{{-- resources/views/users/profile.blade.php --}}
@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-white shadow-md rounded p-6">
        <h2 class="text-2xl font-bold mb-6">Profile</h2>

        @if (session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="username" class="block text-sm font-medium">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username', auth()->user()->username) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div>
                <label>Resume (PDF)</label>
                <input type="file" name="resume">
                @if (Auth::user()->resume)
                    <p>
                        Resume saat ini:
                        <a href="{{ asset('storage/' . Auth::user()->resume) }}" target="_blank">Lihat</a>
                    </p>
                @endif
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update
                    Profile</button>
            </div>
        </form>
    </div>
@endsection
