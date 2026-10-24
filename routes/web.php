<?php

use App\Http\Controllers\CursoController;
use App\Mail\MatriculaConfirmada;
use App\Models\Curso;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::resource('cursos', CursoController::class);
    Route::post('cursos/{curso}/matricular', [CursoController::class, 'matricular'])
        ->name('cursos.matricular');

    Route::post('/logout', function (Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');

    Route::get('/preview-correo', function () {
        $estudiante = Estudiante::first();
        $curso = Curso::with('docente')->first();

        return new MatriculaConfirmada($estudiante, $curso);
    });
});