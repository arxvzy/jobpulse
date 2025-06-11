@extends('layouts.app')

@section('title', 'All Users')

@section('content')
    <div class="max-w-6xl mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-6">All Users</h2>

        <div class="bg-white shadow-md rounded p-6">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Username</th>
                        <th class="px-4 py-2">Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            <td class="px-4 py-2">{{ $user->username }}</td>
                            <td class="px-4 py-2">{{ ucfirst($user->role) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
