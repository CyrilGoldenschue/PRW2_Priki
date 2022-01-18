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

Route::get('/', [HomeController::class, 'index'])->name("homePage");
Route::get('/practice/{id}', [HomeController::class, 'practice']);
Route::get('/opinion/{id}/create', [OpinionController::class, 'create'])->middleware(['auth']);
Route::get('/opinion/{id}/create', [OpinionController::class, 'store'])->middleware(['auth'])->name('opinion.store');



Route::get('/practices', [HomeController::class, 'index'])->middleware(['auth'])->name('practices');
Route::resource("references", ReferenceController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
