@if ($errors->any())
    <div class="mb-4 rounded bg-red-100 p-3 text-red-800">Revise los campos marcados.</div>
@endif

<div class="mb-4">
    <label for="nombre" class="block font-semibold">Nombre del curso</label>
    <input id="nombre" name="nombre" value="{{ old('nombre', $curso->nombre) }}" required minlength="3" maxlength="100" class="w-full rounded border p-2">
    @error('nombre') <p class="text-sm text-red-700">{{ $message }}</p> @enderror
</div>

<div class="mb-4">
    <label for="docente_id" class="block font-semibold">Docente</label>
    <select id="docente_id" name="docente_id" required class="w-full rounded border p-2">
        <option value="">-- Seleccione --</option>
        @foreach ($docentes as $docente)
            <option value="{{ $docente->id }}" @selected(old('docente_id', $curso->docente_id) == $docente->id)>
                {{ $docente->nombre }}
            </option>
        @endforeach
    </select>
    @error('docente_id') <p class="text-sm text-red-700">{{ $message }}</p> @enderror
</div>

<div class="mb-4">
    <label for="creditos" class="block font-semibold">Créditos</label>
    <input id="creditos" type="number" name="creditos" min="1" max="6" required value="{{ old('creditos', $curso->creditos) }}" class="w-full rounded border p-2">
    @error('creditos') <p class="text-sm text-red-700">{{ $message }}</p> @enderror
</div>

<div class="mb-4">
    <label for="descripcion" class="block font-semibold">Descripción</label>
    <textarea id="descripcion" name="descripcion" maxlength="500" class="w-full rounded border p-2">{{ old('descripcion', $curso->descripcion) }}</textarea>
    @error('descripcion') <p class="text-sm text-red-700">{{ $message }}</p> @enderror
</div>

<button class="rounded bg-blue-700 px-4 py-2 text-white">Guardar</button>