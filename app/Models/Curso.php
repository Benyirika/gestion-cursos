<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // Esta es la línea que soluciona el error
    protected $fillable = ['docente_id', 'nombre', 'descripcion', 'creditos'];

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class)->withPivot('nota')->withTimestamps();
    }
}