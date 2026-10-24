<x-mail::message>
# Hola, {{ $estudiante->nombre }}

Tu matricula en **{{ $curso->nombre }}** fue registrada correctamente.

- Docente: {{ $curso->docente->nombre }}
- Créditos: {{ $curso->creditos }}

<x-mail::button :url="route('cursos.show', $curso)">
Ver curso
</x-mail::button>

Saludos,<br>
{{ config('app.name') }}
</x-mail::message>