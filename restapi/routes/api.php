<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('watch', [StudentController::class, 'index'])->name('indexapi');
Route::post('store', [StudentController::class, 'upload'])->name('uploadapi');
Route::put('edit/{id}', [StudentController::class, 'edit'])->name('editapi');
Route::delete('delete/{id}', [StudentController::class, 'delete'])->name('deleteapi');
Route::patch('delete/{id}', [StudentController::class, 'delete'])->name('deleteapi');