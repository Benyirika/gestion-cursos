<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CursoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'creditos' => $this->creditos,
            'docente' => $this->whenLoaded('docente', fn () => $this->docente->nombre),
            'matriculados' => $this->whenCounted('estudiantes'),
            'creado' => $this->created_at?->format('d/m/Y'),
        ];
    }
}