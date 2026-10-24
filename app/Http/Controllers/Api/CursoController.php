<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CursoRequest;
use App\Http\Resources\CursoResource;
use App\Models\Curso;

class CursoController extends Controller
{
    public function index()
    {
        return CursoResource::collection(
            Curso::with('docente')->withCount('estudiantes')->paginate(10)
        );
    }

    public function store(CursoRequest $request)
    {
        $curso = Curso::create($request->validated());

        return (new CursoResource($curso->load('docente')))
            ->response()->setStatusCode(201);
    }

    public function show(Curso $curso)
    {
        return new CursoResource($curso->load('docente')->loadCount('estudiantes'));
    }

    public function update(CursoRequest $request, Curso $curso)
    {
        $curso->update($request->validated());

        return new CursoResource($curso->load('docente'));
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();

        return response()->noContent();   // 204
    }
}