<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido · Gestión de Cursos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-zinc-100 flex flex-col items-center justify-center min-h-screen text-zinc-900">
    <div class="bg-white p-10 rounded-lg shadow-md text-center max-w-lg">
        <h1 class="text-4xl font-bold text-blue-700 mb-4">Gestión de Cursos</h1>
        <p class="mb-8 text-lg text-zinc-600">Bienvenido al sistema de administración académica. Por favor, inicia sesión para continuar.</p>
        
        @auth
            <a href="{{ url('/cursos') }}" class="rounded bg-blue-700 px-6 py-3 text-white font-bold hover:bg-blue-800 transition">Ir a mis Cursos</a>
        @else
            <a href="{{ route('login') }}" class="rounded bg-blue-700 px-6 py-3 text-white font-bold hover:bg-blue-800 transition">Iniciar Sesión</a>
        @endauth
    </div>
</body>
</html>