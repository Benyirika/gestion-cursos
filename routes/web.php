<?php
use App\Http\Controllers\CursoController;
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
    Route::post('logout', function () {
        auth()->logout();
        return redirect('/login');
    })->name('logout');
});
