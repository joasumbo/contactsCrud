<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/', [ContactController::class, 'index'])
    ->name('index.contacto');

Route::get('/adicionar', [ContactController::class, 'create'])
    ->name('adicionar.contacto');

Route::get('/detalhes/{id}', [ContactController::class, 'show'])
    ->name('detalhe.contacto');

Route::post('/salvar', [ContactController::class, 'store'])
    ->name('salvar.contacto');


Route::get('/editar/{id}', [ContactController::class, 'edit'])
    ->name('editar.contacto');

Route::post('/atualizar/{id}', [ContactController::class, 'update'])
    ->name('atualizar.contacto');

Route::get('/contacts/{id}', [ContactController::class, 'destroy'])
    ->name('excluir.contacto');
