<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherDocumentController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('teachers', TeacherController::class);

Route::prefix('teachers')->group(function () {
     Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('teachers.dashboard');
     Route::get('/list', [TeacherController::class, 'list'])->name('teachers.list');
     Route::get('/create', [TeacherController::class, 'create'])->name('teachers.create');
     Route::post('/store', [TeacherController::class, 'store'])->name('teachers.store');
     Route::get('/{id}', [TeacherController::class, 'profile'])->name('teachers.profile');
     Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
     Route::post('/update', [TeacherController::class, 'update'])->name('teachers.update');
     Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

     Route::prefix('/documents/{id}')->group(function () {
        Route::get('/list', [TeacherDocumentController::class, 'list'])->name('teachers.documents.list');
        Route::get('/create', [TeacherDocumentController::class, 'create'])->name('teachers.documents.create');
        Route::POST('/store', [TeacherDocumentController::class, 'store'])->name('teachers.documents.store');
        Route::get('/{id}/edit', [TeacherDocumentController::class, 'edit'])->name('teachers.documents.edit');
        Route::post('/update', [TeacherDocumentController::class, 'update'])->name('teachers.documents.update');
        Route::delete('/{id}', [TeacherDocumentController::class, 'destroy'])->name('teachers.documents.destroy');
       });
    });

Route::prefix('students')->group(function () {
    Route::get('/list', [StudentController::class, 'list'])->name('students.list');
    Route::get('/create', [StudentController::class, 'create'])->name('students.create');
    });

// Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('dashboard');

// Route::prefix('products')->group(function () {
//     Route::get('/', [TeacherController::class, 'index'])->name('products.index');
//     Route::get('/create', [TeacherController::class, 'create'])->name('products.create');
//     Route::post('/store', [TeacherController::class, 'store'])->name('products.store');
//     Route::get('/{id}', [TeacherController::class, 'show'])->name('products.show');
//     Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('products.edit');
//     Route::put('/update', [TeacherController::class, 'update'])->name('products.update');
//     Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('products.destroy');
// });