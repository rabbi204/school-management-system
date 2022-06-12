<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;

/*
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

//User Management all route
    Route::prefix('/users')->group(function(){
        Route::get('/view', [UserController::class, 'userView'])->name('user.view');
        Route::get('/add', [UserController::class, 'userAdd'])->name('users.add');
        Route::post('/store', [UserController::class, 'userStore'])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, 'userEdit'])->name('user.edit');
        Route::post('/update/{id}', [UserController::class, 'userUpdate'])->name('user.update');
        Route::get('/delete/{id}', [UserController::class, 'userDelete'])->name('user.delete');
    });
//User Profile and Password all route
    Route::prefix('/profile')->group(function(){
        Route::get('/view', [ProfileController::class, 'profileView'])->name('profile.view');
        Route::get('/edit', [ProfileController::class, 'profileEdit'])->name('profile.edit');
        Route::post('/update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
        Route::get('/password/view', [ProfileController::class, 'passwordView'])->name('profile.password.view');
        Route::post('/password/update', [ProfileController::class, 'passwordUpdate'])->name('profile.password.update');
    });

// Student Class Routes
    Route::prefix('/setups')->group(function(){
        Route::get('/student/class/view/', [StudentClassController::class, 'viewStudentClass'])->name('student.class.view');
        Route::get('/student/class/add/', [StudentClassController::class, 'addStudentClass'])->name('student.class.add');
        Route::post('/student/class/store/', [StudentClassController::class, 'storeStudentClass'])->name('student.class.store');
        Route::post('/student/class/store/', [StudentClassController::class, 'storeStudentClass'])->name('student.class.store');
        Route::get('/student/class/edit/{id}', [StudentClassController::class, 'editStudentClass'])->name('student.class.edit');
        Route::post('/student/class/update/{id}', [StudentClassController::class, 'updateStudentClass'])->name('student.class.update');
        Route::get('/student/class/delete/{id}', [StudentClassController::class, 'deleteStudentClass'])->name('student.class.delete');

        //student year routes
        Route::get('/student/year/view/', [StudentYearController::class, 'studentYearView'])->name('student.year.view');
        Route::get('/student/year/add/', [StudentYearController::class, 'addStudentYear'])->name('student.year.add');
        Route::post('/student/year/store/', [StudentYearController::class, 'storeStudentYear'])->name('student.year.store');
        Route::get('/student/year/edit/{id}', [StudentYearController::class, 'editStudentYear'])->name('student.year.edit');
        Route::post('/student/year/update/{id}', [StudentYearController::class, 'updateStudentYear'])->name('student.year.update');
        Route::get('/student/year/delete/{id}', [StudentYearController::class, 'deleteStudentYear'])->name('student.year.delete');
    });
