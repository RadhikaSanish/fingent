<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentMarkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('student')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('student');
    Route::get('create', [StudentController::class, 'create'])->name('createStudent');
    Route::post('store', [StudentController::class, 'store'])->name('storeStudent');
    Route::get('edit/{id}', [StudentController::class, 'edit'])->name('editStudent');
    Route::post('update', [StudentController::class, 'update'])->name('updateStudent');
    Route::delete('delete/{id}', [StudentController::class, 'destroy'])->name('deleteStudent');

    Route::prefix('mark')->group(function () {
        Route::get('/', [StudentMarkController::class, 'index'])->name('mark');
        Route::get('create', [StudentMarkController::class, 'create'])->name('createMark');
        Route::post('store', [StudentMarkController::class, 'store'])->name('storeMark');
        Route::get('edit/{id}', [StudentMarkController::class, 'edit'])->name('editMark');
        Route::post('update', [StudentMarkController::class, 'update'])->name('updateMark');
        Route::delete('delete/{id}', [StudentMarkController::class, 'destroy'])->name('deleteMark');
    });
});


