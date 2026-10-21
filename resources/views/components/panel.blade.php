@props(['titulo' => 'Gestión de Cursos'])
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $titulo }} · {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-zinc-100 text-zinc-900">
    <nav class="flex items-center gap-6 bg-white px-6 py-4 shadow">
        <a href="{{ route('cursos.index') }}" class="font-bold">Gestión de Cursos</a>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <span class="ml-auto text-sm">{{ auth()->user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="text-sm text-red-700">Salir</button>
        </form>
    </nav>
    <main class="mx-auto max-w-5xl p-6">
        <h1 class="mb-4 text-2xl font-bold">{{ $titulo }}</h1>
        @if (session('ok'))
            <p class="mb-4 rounded bg-green-100 p-3 text-green-800">{{ session('ok') }}</p>
        @endif
        {{ $slot }}
    </main>
</body>
</html>