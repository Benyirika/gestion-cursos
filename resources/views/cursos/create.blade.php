<x-panel titulo="Nuevo curso">
    <form method="POST" action="{{ route('cursos.store') }}" class="rounded bg-white p-6">
        @csrf
        @include('cursos._form')
    </form>
</x-panel>