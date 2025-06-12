@extends('layouts.app')

@section('title', 'Employer Profile')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-white shadow-md rounded-lg p-6">
        <x-flash />
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Profil Perusahaan</h2>

        <form method="POST" action="{{ route('employer.update') }}" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="company_name" class="block text-sm font-semibold text-gray-700 mb-1">Nama Perusahaan</label>
                <input type="text" name="company_name" id="company_name"
                    value="{{ old('company_name', $employer->company_name) }}"
                    class="w-full border border-gray-300 bg-white rounded-lg px-4 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    required>
            </div>

            <div>
                <label for="company_address" class="block text-sm font-semibold text-gray-700 mb-1">Alamat
                    Perusahaan</label>
                <input type="text" name="company_address" id="company_address"
                    value="{{ old('company_address', $employer->company_address) }}"
                    class="w-full border border-gray-300 bg-white rounded-lg px-4 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    required>
            </div>

            <div>
                <label for="company_phone" class="block text-sm font-semibold text-gray-700 mb-1">Nomor Telepon</label>
                <input type="text" name="company_phone" id="company_phone"
                    value="{{ old('company_phone', $employer->company_phone) }}"
                    class="w-full border border-gray-300 bg-white rounded-lg px-4 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    required>
            </div>

            <div class="pt-4 text-right">
                <button type="submit"
                    class="inline-flex items-center gap-2 bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 transition text-sm font-medium focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Update Profile
                </button>
            </div>
        </form>
    </div>
@endsection
