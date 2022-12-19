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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);



Route::get('/fakultas', [App\Http\Controllers\FacultyController::class, 'index']);
Route::get('/fakultas/create', [App\Http\Controllers\FacultyController::class, 'create']);
Route::post('/fakultas/store', [App\Http\Controllers\FacultyController::class, 'store']);
Route::get('/fakultas/edit/{id}', [App\Http\Controllers\FacultyController::class, 'edit']);
Route::post('/fakultas/update', [App\Http\Controllers\FacultyController::class, 'update']);
Route::get('/fakultas/hapus/{id}', [App\Http\Controllers\FacultyController::class, 'destroy']);
// Route::get('/faculty/cari', [App\Http\Controllers\FacultyController::class, 'cari']);
// Route::post('/siswa/import_excel', [App\Http\Controllers\FacultyController::class, 'import_excel']);
// Route::get('/faculty/export_excel', [App\Http\Controllers\FacultyController::class, 'export_excel']);


Route::get('/student', [App\Http\Controllers\StudentController::class, 'index']);
Route::get('/student/create', [App\Http\Controllers\StudentController::class, 'create']);
Route::post('/student/store', [App\Http\Controllers\StudentController::class, 'store']);
Route::get('/student/edit{id}', [App\Http\Controllers\StudentController::class, 'edit']);
Route::post('/fakultas/update', [App\Http\Controllers\FacultyController::class, 'update']);
Route::get('/fakultas/hapus/{id}', [App\Http\Controllers\FacultyController::class, 'destroy']);