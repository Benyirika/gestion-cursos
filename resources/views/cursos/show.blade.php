<x-panel :titulo="$curso->nombre">
    <div class="mb-6 rounded bg-white p-6">
        <p><b>Docente:</b> {{ $curso->docente->nombre }}</p>
        <p><b>Créditos:</b> {{ $curso->creditos }}</p>
        <p class="mt-2">{{ $curso->descripcion }}</p>
    </div>

    <h2 class="mb-2 text-xl font-bold">
        Estudiantes matriculados ({{ $curso->estudiantes->count() }})
    </h2>
    <ul class="mb-6 rounded bg-white p-4">
        @forelse ($curso->estudiantes as $estudiante)
            <li>{{ $loop->iteration }}. {{ $estudiante->nombre }} — nota: {{ $estudiante->pivot->nota ?? 'sin nota' }}</li>
        @empty
            <li>Aún no hay estudiantes matriculados.</li>
        @endforelse
    </ul>

    <form method="POST" action="{{ route('cursos.matricular', $curso) }}" class="flex gap-2 rounded bg-white p-4">
        @csrf
        <select name="estudiante_id" required class="flex-1 rounded border p-2">
            <option value="">-- Matricular estudiante --</option>
            @foreach ($disponibles as $e)
                <option value="{{ $e->id }}">{{ $e->nombre }}</option>
            @endforeach
        </select>
        <input type="number" name="nota" min="0" max="20" step="0.5" placeholder="Nota" class="w-28 rounded border p-2">
        <button class="rounded bg-blue-700 px-4 py-2 text-white">Matricular</button>
    </form>
</x-panel>