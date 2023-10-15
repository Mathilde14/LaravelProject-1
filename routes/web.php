<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttributionController;
use Illuminate\Support\Facades\Auth;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('auth')->group(function(){
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    });
    Route::prefix('settings')->group(function(){
        Route::get('/', [SchoolYearController::class, 'index'])->name('settings');
        Route::get('/create-school-year', [SchoolYearController::class, 'create'])->name('settings.create-school-year');
        Route::get('/create-niveau', [NiveauController::class, 'create'])->name('niveaux.create-niveau');
        Route::get('/edit-niveau/{niveau}', [NiveauController::class, 'edit'])->name('niveaux.edit-niveau');
    });
    Route::prefix('niveaux')->group(function(){
        Route::get('/',  [NiveauController::class, 'index'])->name('niveaux');
    });
    Route::prefix('classes')->group(function(){
        Route::get('/',[ClasseController::class, 'index'])->name('classes');
        Route::get('/create',[ClasseController::class, 'create'])->name('classes.create');
        Route::get('/edit/{classes}',[ClasseController::class, 'edit'])->name('classes.edit');
    });
    Route::prefix('eleves')->group(function(){
        Route::get('/', [StudentController::class, 'index'])->name('students');
        Route::get('/', [StudentController::class, 'index'])->name('students');
        Route::get('/create', [StudentController::class, 'create'])->name('students.create');
        Route::get('/edit/{students}', [StudentController::class, 'edit'])->name('students.edit');
        Route::get('/{students}', [StudentController::class, 'show'])->name('students.show');

    });
    
    Route::prefix('inscriptions')->group(function(){
        Route::get('/', [AttributionController::class, 'index'])->name('inscriptions');
        Route::get('/', [AttributionController::class, 'index'])->name('inscriptions');
        Route::get('/create', [AttributionController::class, 'create'])->name('inscriptions.create');
        Route::get('/edit/{inscriptions}', [AttributionController::class, 'edit'])->name('inscriptions.edit');

    });


});


