<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'docente_id'  => ['required', 'exists:docentes,id'],
            'nombre'      => ['required', 'string', 'min:3', 'max:100'],
            'descripcion' => ['nullable', 'string', 'max:500'],
            'creditos'    => ['required', 'integer', 'between:1,6'],
        ];
    }

    public function messages(): array
    {
        return [
            'docente_id.required' => 'Seleccione un docente.',
            'docente_id.exists'   => 'El docente seleccionado no existe.',
            'nombre.required'     => 'El nombre del curso es obligatorio.',
            'nombre.min'          => 'El nombre debe tener al menos 3 caracteres.',
            'nombre.max'          => 'El nombre no debe superar los 100 caracteres.',
            'creditos.required'   => 'Indique el número de créditos.',
            'creditos.integer'    => 'Los créditos deben ser un número entero.',
            'creditos.between'    => 'Los créditos deben estar entre 1 y 6.',
        ];
    }
}