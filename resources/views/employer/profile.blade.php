@extends('layouts.app')

@section('title', 'Employer Profile')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-white shadow-md rounded p-6">
        <h2 class="text-2xl font-bold mb-6">Company Profile</h2>

        @if (session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('employer.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="company_name" class="block text-sm font-medium">Company Name</label>
                <input type="text" name="company_name" id="company_name"
                    value="{{ old('company_name', $employer->company_name) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="company_address" class="block text-sm font-medium">Company Address</label>
                <input type="text" name="company_address" id="company_address"
                    value="{{ old('company_address', $employer->company_address) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="company_phone" class="block text-sm font-medium">Company Phone</label>
                <input type="text" name="company_phone" id="company_phone"
                    value="{{ old('company_phone', $employer->company_phone) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update
                    Profile</button>
            </div>
        </form>
    </div>
@endsection
