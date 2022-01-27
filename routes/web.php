<?php

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

use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PracticeController;


Route::get('/opinion/{id}/create', [OpinionController::class, 'create'])->middleware(['auth']);
Route::get('/opinion/{id}/store', [OpinionController::class, 'store'])->middleware(['auth'])->name('opinion.store');


Route::get('/practices', [PracticeController::class, 'showAll'])->middleware(['auth']);
Route::get('/practice/{id}/publish', [PracticeController::class, 'publish'])->middleware(['auth']);
Route::get('/practice/{id}/edit', [PracticeController::class, 'edit'])->middleware(['auth']);
Route::post('/practice/update', [PracticeController::class, 'update'])->middleware(['auth'])->name('practice.update');


Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name("home");



Route::resource("references", ReferenceController::class)->middleware(['auth']);
Route::get('/practice/{id}', [PracticeController::class, 'show'])->middleware(['auth']);


require __DIR__ . '/auth.php';
