<nav class="bg-white shadow py-4 px-6 flex justify-between items-center">
    <div>
        <a href="{{ route('jobs.index') }}" class="font-bold text-xl text-blue-600">JobPulse</a>
    </div>
    <div class="flex gap-4 items-center">
        @auth
            @if (Auth::user()->role === 'employer')
                <a href="{{ route('jobs.my') }}" class="text-gray-700 hover:text-blue-500">Lowongan Saya</a>
                <a href="{{ route('jobs.create') }}" class="text-gray-700 hover:text-blue-500">Buat Lowongan</a>
                <a href="{{ route('employer.profile') }}" class="text-gray-700 hover:text-blue-500">Profil Perusahaan</a>
            @else
                <a href="{{ route('applications.mine') }}" class="text-gray-700 hover:text-blue-500">Lamaran Saya</a>
                <a href="{{ route('user.profile') }}" class="text-gray-700 hover:text-blue-500">Profil Saya</a>
            @endif
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button class="text-red-500 hover:underline cursor-pointer">Keluar</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-500">Masuk</a>
            <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-500">Daftar</a>
        @endauth
    </div>
</nav>
