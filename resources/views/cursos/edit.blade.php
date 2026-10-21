<x-panel titulo="Editar curso">
    <form method="POST" action="{{ route('cursos.update', $curso) }}" class="rounded bg-white p-6">
        @csrf
        @method('PUT')
        @include('cursos._form')
    </form>
</x-panel>