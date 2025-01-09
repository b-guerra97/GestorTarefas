<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

// Rotas Protegidas
Route::middleware(['auth'])->group(function () {
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);

});

// Rota Principal
Route::get('/', function () {
    return view('home');
});

// Rotas de acesso do utilizador
Route::post('/registo', [UserController::class, 'registo']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

