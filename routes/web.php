<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
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

        //student group routes
        Route::get('/student/group/view/', [StudentGroupController::class, 'studentGroupView'])->name('student.group.view');
        Route::get('/student/group/add/', [StudentGroupController::class, 'addStudentGroup'])->name('student.group.add');
        Route::post('/student/group/store/', [StudentGroupController::class, 'storeStudentGroup'])->name('student.group.store');
        Route::get('/student/group/edit/{id}', [StudentGroupController::class, 'editStudentGroup'])->name('student.group.edit');
        Route::post('/student/group/update/{id}', [StudentGroupController::class, 'updateStudentGroup'])->name('student.group.update');
        Route::get('/student/group/delete/{id}', [StudentGroupController::class, 'deleteStudentGroup'])->name('student.group.delete');

        //student Shift routes
        Route::get('/student/shift/view/', [StudentShiftController::class, 'studentShiftView'])->name('student.shift.view');
        Route::get('/student/shift/add/', [StudentShiftController::class, 'addStudentShift'])->name('student.shift.add');
        Route::post('/student/shift/store/', [StudentShiftController::class, 'storeStudentShift'])->name('student.shift.store');
        Route::get('/student/shift/edit/{id}', [StudentShiftController::class, 'editStudentShift'])->name('student.shift.edit');
        Route::post('/student/shift/update/{id}', [StudentShiftController::class, 'updateStudentShift'])->name('student.shift.update');
        Route::get('/student/shift/delete/{id}', [StudentShiftController::class, 'deleteStudentShift'])->name('student.shift.delete');

        //Fee Category routes
        Route::get('/fee/category/view/', [FeeCategoryController::class, 'viewFeeCategory'])->name('fee.category.view');
        Route::get('/fee/category/add/', [FeeCategoryController::class, 'addFeeCategory'])->name('fee.category.add');
        Route::post('/fee/category/store/', [FeeCategoryController::class, 'storeFeeCategory'])->name('fee.category.store');
        Route::get('/fee/category/edit/{id}', [FeeCategoryController::class, 'editFeeCategory'])->name('fee.category.edit');
        Route::post('/fee/category/update/{id}', [FeeCategoryController::class, 'updateFeeCategory'])->name('fee.category.update');
        Route::get('/fee/category/delete/{id}', [FeeCategoryController::class, 'deleteFeeCategory'])->name('fee.category.delete');

    });
