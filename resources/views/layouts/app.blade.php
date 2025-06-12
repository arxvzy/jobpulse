<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Job Portal')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col">
        @include('components.navbar')
        <main class="flex-grow mx-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
