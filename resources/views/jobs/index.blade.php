@extends('layouts.app')

@section('title', 'Lowongan Tersedia')

@section('content')
    <div class="max-w-3xl mx-auto mt-10">
        <x-flash />
        <form action="{{ route('jobs.index') }}" method="GET"
            class="mb-6 bg-white p-4 rounded-lg shadow border border-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="keyword" class="block text-sm font-medium text-gray-700 mb-1">Judul Pekerjaan</label>
                    <input type="text" name="keyword" id="keyword" value="{{ request('keyword') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:border-blue-400"
                        placeholder="Contoh: Backend Developer">
                </div>
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                    <input type="text" name="location" id="location" value="{{ request('location') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:border-blue-400"
                        placeholder="Contoh: Jakarta, Bandung">
                </div>
                <div>
                    <label for="job_type" class="block text-sm font-medium text-gray-700 mb-1">Tipe Pekerjaan</label>
                    <select name="job_type" id="job_type"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:border-blue-400">
                        <option value="">Semua Tipe</option>
                        <option value="Full Time" {{ request('job_type') === 'Full-time' ? 'selected' : '' }}>Full-time
                        </option>
                        <option value="Part Time" {{ request('job_type') === 'Part-time' ? 'selected' : '' }}>Part-time
                        </option>
                        <option value="Remote" {{ request('job_type') === 'Remote' ? 'selected' : '' }}>Remote</option>
                        <option value="Magang" {{ request('job_type') === 'Freelance' ? 'selected' : '' }}>Magang
                        </option>
                    </select>
                </div>
            </div>
            <div class="mt-4 text-right">
                <button type="submit"
                    class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm transition">
                    @include('svg.search')
                    Cari Pekerjaan
                </button>
            </div>
        </form>

        <h2 class="text-2xl font-bold mb-4 flex">Daftar Lowongan Pekerjaan</h2>

        @if ($jobs->isEmpty())
            <p class="text-gray-600">Lowongan pekerjaan tidak ditemukan.</p>
        @endif
        @foreach ($jobs as $job)
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

                <button onclick="openModal('modal-{{ $job->id }}')"
                    class="mt-4 inline-flex items-center bg-indigo-600 text-white text-sm px-4 py-2 rounded hover:bg-indigo-700 transition duration-200 gap-2">
                    @include('svg.eye')
                    Lihat Detail
                </button>
            </div>

            <!-- Modal -->
            <div id="modal-{{ $job->id }}"
                class="fixed inset-0 z-50 hidden flex items-center justify-center backdrop-blur-sm bg-white/10">
                <div class="bg-white rounded-lg shadow-2xl w-full max-w-lg mx-4 p-6 relative">
                    <button onclick="closeModal('modal-{{ $job->id }}')"
                        class="absolute top-3 right-4 text-gray-400 hover:text-gray-600 text-2xl leading-none">
                        &times;
                    </button>

                    <div class="flex items-center gap-2 mb-4">
                        @include('svg.briefcase')
                        <h4 class="text-xl font-bold text-gray-900">{{ $job->title }}</h4>
                    </div>

                    <div class="text-sm text-gray-700 space-y-3">
                        <p class="flex items-start gap-2">
                            @include('svg.briefcase')
                            <span><strong>Posisi:</strong> {{ $job->title }}</span>
                        </p>

                        <p class="flex items-start gap-2">
                            @include('svg.building-office-2')
                            <span><strong>Perusahaan:</strong> {{ $job->user->company_name }}</span>
                        </p>

                        <p class="flex items-start gap-2">
                            @include('svg.map-pin2')
                            <span><strong>Alamat Perusahaan:</strong> {{ $job->user->company_address }}</span>
                        </p>

                        <p class="flex items-start gap-2">
                            @include('svg.phone')
                            <span><strong>Kontak Perusahaan:</strong> {{ $job->user->company_phone }}</span>
                        </p>

                        <p class="flex items-start gap-2">
                            @include('svg.mail')
                            <span><strong>Email Rekrutmen:</strong> {{ $job->user->email }}</span>
                        </p>

                        <p class="flex items-start gap-2">
                            @include('svg.map-pin2')
                            <span><strong>Lokasi Kerja:</strong> {{ $job->location }}</span>
                        </p>

                        <p class="flex items-start gap-2">
                            @include('svg.clock2')
                            <span><strong>Tipe Pekerjaan:</strong> {{ $job->job_type }}</span>
                        </p>

                        <p class="flex items-start gap-2">
                            @include('svg.currency-dollar2')
                            <span><strong>Gaji:</strong> Rp{{ number_format($job->salary, 0, ',', '.') }}</span>
                        </p>

                        <p class="flex items-start gap-2">
                            @include('svg.status')
                            <span><strong>Status:</strong> {{ ucfirst($job->status) }}</span>
                        </p>

                        <div class="mt-3">
                            <h5 class="font-semibold mb-1">Deskripsi Pekerjaan:</h5>
                            <p class="text-gray-600 whitespace-pre-line">{{ $job->description }}</p>
                        </div>
                    </div>

                    @if (Auth::check() && Auth::user()->role === 'user')
                        @if (!$job->applications->contains('user_id', Auth::id()))
                            <form action="{{ route('applications.store') }}" method="POST" class="mb-4  mt-4 text-left">
                                @csrf
                                <input type="hidden" name="job_id" value="{{ $job->id }}">

                                <button type="submit"
                                    class="inline-flex items-center bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition gap-2">
                                    @include('svg.paper-airplane')
                                    Lamar Pekerjaan Ini
                                </button>
                            </form>
                        @else
                            <p class="mb-4 mt-4 text-sm text-gray-500 italic text-left">Kamu sudah melamar pekerjaan ini.
                            </p>
                        @endif
                    @elseif (!Auth::check())
                        <div class="mb-4 mt-4 text-left">
                            <a href="{{ route('login') }}"
                                class="inline-flex items-center bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition gap-2">
                                @include('svg.lock-closed')
                                Login untuk melamar pekerjaan ini
                            </a>
                        </div>
                    @endif



                    <div class="text-right mt-6">
                        <button onclick="closeModal('modal-{{ $job->id }}')"
                            class="inline-flex items-center bg-red-200 text-red-800 px-4 py-2 rounded hover:bg-red-300 transition">
                            @include('svg.x-circle')
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if ($jobs->hasPages())
        <div class="flex justify-between max-w-3xl mx-auto items-center gap-4 mt-6 pb-10">
            {{-- Tombol Previous --}}
            @if ($jobs->onFirstPage())
                <span class="px-4 py-2 bg-gray-200 text-gray-500 rounded cursor-not-allowed invisible">Previous</span>
            @else
                <a href="{{ $jobs->previousPageUrl() }}"
                    class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                    Sebelumnya
                </a>
            @endif

            {{-- Halaman Saat Ini --}}
            <span class="font-semibold text-indigo-600">
                {{ $jobs->currentPage() }}
            </span>

            {{-- Tombol Next --}}
            @if ($jobs->hasMorePages())
                <a href="{{ $jobs->nextPageUrl() }}"
                    class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                    Selanjutnya
                </a>
            @else
                <span class="px-4 py-2 bg-gray-200 text-gray-500 rounded cursor-not-allowed invisible">Next</span>
            @endif
        </div>
    @endif
    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>
@endsection
