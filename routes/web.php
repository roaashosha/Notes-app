<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

//login
Route::get('/login', [AuthController::class, 'loginForm'])->name('auth.loginForm');
Route::post('/login',[AuthController::class,'login'])->name('auth.login');

//register
Route::get('/signup',[AuthController::class,'registerForm'])->name('auth.signupForm');
Route::post('/signup',[AuthController::class,'register'])->name('auth.signup');

//logout
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

//notes
Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
Route::get('note/create', [NoteController::class, 'create'])->name('notes.create');
Route::post('note/create', [NoteController::class, 'store'])->name('notes.store');
Route::get('note/show/{id}', [NoteController::class, 'show'])->name('notes.show');
Route::get('note/edit/{id}', [NoteController::class, 'edit'])->name('notes.edit');
Route::put('note/update/{id}', [NoteController::class, 'update'])->name('notes.update');
Route::delete('/note/delete/{id}', [NoteController::class, 'destroy'])->name('notes.delete');



