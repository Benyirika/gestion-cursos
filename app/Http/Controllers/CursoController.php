<?php
namespace App\Http\Controllers;

use App\Http\Requests\CursoRequest;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Mail\MatriculaConfirmada;
use Illuminate\Support\Facades\Mail;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with('docente')->withCount('estudiantes')
            ->latest()->paginate(5);

        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create', [
            'curso' => new Curso,
            'docentes' => Docente::orderBy('nombre')->get(),
        ]);
    }

    public function store(CursoRequest $request)
    {
        Curso::create($request->validated());

        return to_route('cursos.index')->with('ok', 'Curso registrado correctamente.');
    }

    public function show(Curso $curso)
    {
        $curso->load(['docente', 'estudiantes']);
        $disponibles = Estudiante::whereDoesntHave(
            'cursos', fn ($q) => $q->where('cursos.id', $curso->id)
        )->orderBy('nombre')->get();

        return view('cursos.show', compact('curso', 'disponibles'));
    }

    public function edit(Curso $curso)
    {
        return view('cursos.edit', [
            'curso' => $curso,
            'docentes' => Docente::orderBy('nombre')->get(),
        ]);
    }

    public function update(CursoRequest $request, Curso $curso)
    {
        $curso->update($request->validated());

        return to_route('cursos.index')->with('ok', 'Curso actualizado.');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();

        return to_route('cursos.index')->with('ok', 'Curso eliminado.');
    }

   public function matricular(Request $request, Curso $curso)
    {
        $datos = $request->validate([
        'estudiante_id' => ['required', 'exists:estudiantes,id'],
        'nota' => ['nullable', 'numeric', 'between:0,20'],
        ]);

        $curso->estudiantes()->attach($datos['estudiante_id'], ['nota' => $datos['nota'] ?? null]);

        
        $estudiante = Estudiante::find($datos['estudiante_id']);
        Mail::to($estudiante->email)->send(new MatriculaConfirmada($estudiante, $curso));

        return back()->with('ok', 'Estudiante matriculado.');
    }
}