<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherDocumentController;
use App\Http\Controllers\StudentController;
use app\Mail\MyTestEmail;

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
        //Route::get('/edit/{id}', [TeacherDocumentController::class, 'edit'])->name('teachers.documents.edit');
        Route::post('/update', [TeacherDocumentController::class, 'update'])->name('teachers.documents.update');
        Route::delete('/{id}', [TeacherDocumentController::class, 'destroy'])->name('teachers.documents.destroy');
       });
    });

    Route::prefix('students')->group(function () {
        Route::get('/list', [StudentController::class, 'list'])->name('students.list');
        Route::get('/create', [StudentController::class, 'create'])->name('students.create');
    });

    Route::get('/sendmail', [TeacherController::class, 'sendmail'])->name('sendmail');
    Route::post('/sendmail', [TeacherController::class, 'sendmailSubmit'])->name('sendmail.submit');

Route::get('/send', function () {
    $data = [
        'name' => 'Qadeer Send Mail...',
        'subject' => 'Test Email',
        'message' => 'This is a test email.',
    ];
    Mail::to('aq8091360@gmail.com')->send(new \App\Mail\MyTestEmail($data));
    return 'Email sent!';
});
