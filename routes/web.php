<?php

use App\Http\Controllers\ArchivesController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ForumController::class, 'index']);

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile');

    // Questions
    Route::get('/questions', [QuestionController::class, 'index'])->name('questions');
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/questions/create', [QuestionController::class, 'store'])->name('questions.create');
    Route::get('/questions/{id}/update', [QuestionController::class, 'update'])->name('questions.update');
    Route::post('/questions/{id}/update', [QuestionController::class, 'save'])->name('questions.update');
    Route::post('/questions/{id}/delete', [QuestionController::class, 'destroy'])->name('questions.delete');

    // Responses
    Route::get('/questions/{id}/responses', [ResponseController::class, 'show'])->name('responses.show');
});


require __DIR__ . '/auth.php';
