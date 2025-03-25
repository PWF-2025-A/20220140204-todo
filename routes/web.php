<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoCOntroller;
 use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('Home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/todo', [TodoCOntroller::class, 'index'])->name('todo.index');
 Route::get('/todo/create', [TodoCOntroller::class, 'create'])->name('todo.create');
 Route::get('/todo/edit', [TodoCOntroller::class, 'edit'])->name('todo.edit');
 
 Route::get('/user', [UserController::class, 'index'])->name('user.index');
 
require __DIR__.'/auth.php';
