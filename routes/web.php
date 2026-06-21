<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\SubjectsController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/subjects', [SubjectsController::class, 'index'])->name('admin.subjects.index');
    Route::get('/subjects/create', [SubjectsController::class, 'create'])->name('admin.subjects.create');

    Route::get('/subjects/{subject}/edit', [SubjectsController::class, 'edit'])->name('admin.subjects.edit');
    Route::put('/subjects/{subject}', [SubjectsController::class, 'update'])->name('admin.subjects.update');

    Route::post('/subjects/store', [SubjectsController::class, 'store'])->name('admin.subjects.store');

    Route::delete('/subjects/{subject}', [SubjectsController::class, 'destroy'])->name('admin.subjects.destroy');
});
