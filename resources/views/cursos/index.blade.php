<x-panel titulo="Cursos">
    <a href="{{ route('cursos.create') }}" class="mb-4 inline-block rounded bg-blue-700 px-4 py-2 text-white">+ Nuevo curso</a>
    <table class="w-full bg-white">
        <thead>
            <tr class="bg-zinc-200 text-left">
                <th class="p-2">Curso</th>
                <th class="p-2">Docente</th>
                <th class="p-2">Créditos</th>
                <th class="p-2">Matriculados</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cursos as $curso)
                <tr class="border-b">
                    <td class="p-2">{{ $curso->nombre }}</td>
                    <td class="p-2">{{ $curso->docente->nombre }}</td>
                    <td class="p-2">{{ $curso->creditos }}</td>
                    <td class="p-2">{{ $curso->estudiantes_count }}</td>
                    <td class="flex gap-3 p-2">
                        <a href="{{ route('cursos.show', $curso) }}">Ver</a>
                        <a href="{{ route('cursos.edit', $curso) }}">Editar</a>
                        <form method="POST" action="{{ route('cursos.destroy', $curso) }}" onsubmit="return confirm('¿Eliminar este curso?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-700">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="p-4">No hay cursos registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">{{ $cursos->links() }}</div>
</x-panel>