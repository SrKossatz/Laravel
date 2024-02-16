<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
})->name('bemvindos');

// Rotas dos users
// Rota para mostrar o formulario
Route::get('/users/add', [UserController::class, 'users'])->name('users.add');
// Rota para pegar dados do formulário
Route::post('/users/create', [UserController::class, 'createUser'])->name('user.create');
Route::post('/users/update', [UserController::class, 'updateUser'])->name('user.update');

// middleware só libera acesso a rota users/all se estiver auth (logado)
// Route::get('/users/all', [UserController::class, 'allUsers'])->name('users.all')->middleware('auth');
Route::get('/users/all', [UserController::class, 'allUsers'])->name('users.all');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('backoffice.dashboard');



Route::get('/users/view/{id}', [UserController::class, 'viewUser'])->name('users.view');
Route::get('/users/delete/{id}', [UserController::class, 'deleteUser'])->name('users.delete');

//rotas de tasks
Route::get('/tasks/all', [TaskController::class, 'allTasks'])->name('tasks.all');
Route::get('/tasks/view/{id}', [TaskController::class, 'viewTask'])->name('tasks.view');
Route::get('/tasks/delete/{id}', [TaskController::class, 'deleteTask'])->name('tasks.delete');


Route::get('/tasks/add', [TaskController::class, 'addTask'])->name('tasks.add');
Route::post('tasks/create', [TaskController::class, 'createTask'])->name('tasks.create');



Route::post('tasks/update', [TaskController::class, 'updateTask'])->name('tasks.update');


Route::get('/home', [IndexController::class, 'index']) ->name('home.index');


Route::get('/hello', function () {
    return '<h1>Hello turma de SoftDev</h1>';
});

Route::get('/hello/{nome}', function ($nome) {
    return '<h1>Hello turma de SoftDev</h1>'.$nome;
});

Route::fallback(function(){
    return view('main.fallback');
});

// rotas dos Controllers


