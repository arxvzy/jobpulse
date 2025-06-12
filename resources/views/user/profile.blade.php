@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6">Edit Profil</h2>

        <x-flash />


        {{-- Form Update Profil --}}
        <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
            </div>

            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username', auth()->user()->username) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
            </div>

            <div>
                <label for="resume" class="block text-sm font-medium text-gray-700">Resume (PDF)</label>
                <input type="file" name="resume"
                    class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:ring focus:ring-indigo-200">
                @if (Auth::user()->resume)
                    <p class="mt-1 text-sm text-gray-500">
                        Resume saat ini:
                        <a href="{{ asset('storage/' . Auth::user()->resume) }}" target="_blank"
                            class="text-indigo-600 hover:underline">Lihat</a>
                    </p>
                @endif
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                    Update Profil
                </button>
            </div>
        </form>

        {{-- Divider --}}
        <hr class="my-8 border-gray-200">

        {{-- Form Ubah Password
        <h3 class="text-lg font-semibold mb-4">Ubah Password</h3>
        <form method="POST" action="{{ route('user.update.password') }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="current_password" class="block text-sm font-medium">Password Saat Ini</label>
                <input type="password" name="password" id="current_password"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="new_password" class="block text-sm font-medium">Password Baru</label>
                <input type="password" name="new_password" id="new_password"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="new_password_confirmation" class="block text-sm font-medium">Konfirmasi Password Baru</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    Ubah Password
                </button>
            </div>
        </form> --}}

    </div>
@endsection
