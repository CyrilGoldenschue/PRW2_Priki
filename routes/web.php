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

Route::get('/', [HomeController::class, 'index'])->name("homePage");
Route::get('/home', [HomeController::class, 'index'])->name("homePage");
Route::get('/practice/{id}', [PracticeController::class, 'show'])->middleware(['auth']);
Route::get('/opinion/{id}/create', [OpinionController::class, 'create'])->middleware(['auth']);
Route::get('/opini on/{id}/store', [OpinionController::class, 'store'])->middleware(['auth'])->name('opinion.store');


Route::get('/practices', [PracticeController::class, 'showAll'])->middleware(['auth']);
Route::get('/practice', [HomeController::class, 'index'])->middleware(['auth'])->name('practice');
Route::resource("references", ReferenceController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
