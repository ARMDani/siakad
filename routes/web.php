<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjekcourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\FacultyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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


Route::get('/home', [App\Http\Controllers\LoginController::class, 'index']);

Route::get('/fakultas', [App\Http\Controllers\FacultyController::class, 'index']);
Route::get('/fakultas/create', [App\Http\Controllers\FacultyController::class, 'create']);
Route::post('/fakultas/store', [App\Http\Controllers\FacultyController::class, 'store']);
Route::get('/fakultas/edit/{id}', [App\Http\Controllers\FacultyController::class, 'edit']);
Route::post('/fakultas/update', [App\Http\Controllers\FacultyController::class, 'update']);
Route::get('/fakultas/hapus/{id}', [App\Http\Controllers\FacultyController::class, 'destroy']);
Route::get('/fakultas/cari', [App\Http\Controllers\FacultyController::class, 'search']);
// Route::get('/faculty/cari', [App\Http\Controllers\FacultyController::class, 'cari']);
// Route::post('/siswa/import_excel', [App\Http\Controllers\FacultyController::class, 'import_excel']);
// Route::get('/faculty/export_excel', [App\Http\Controllers\FacultyController::class, 'export_excel']);

Route::get('/student', [App\Http\Controllers\StudentController::class, 'index'])->middleware('auth');
Route::get('/student/create', [App\Http\Controllers\StudentController::class, 'create']);
Route::post('/student/store', [App\Http\Controllers\StudentController::class, 'store']);
Route::get('/student/edit/{id}', [App\Http\Controllers\StudentController::class, 'edit']);
Route::post('/student/update', [App\Http\Controllers\StudentController::class, 'update']);
Route::get('/student/hapus/{id}', [App\Http\Controllers\StudentController::class, 'destroy']);
Route::get('/student/cari', [App\Http\Controllers\StudentController::class, 'search']);

Route::get('/leacture', [App\Http\Controllers\LeactureController::class, 'index']);
Route::get('/leacture/create', [App\Http\Controllers\LeactureController::class, 'create']);
Route::post('/leacture/store', [App\Http\Controllers\LeactureController::class, 'store']);
Route::get('/leacture/edit/{id}', [App\Http\Controllers\LeactureController::class, 'edit']);
Route::post('/leacture/update', [App\Http\Controllers\LeactureController::class, 'update']);
Route::get('/leacture/hapus/{id}', [App\Http\Controllers\LeactureController::class, 'destroy']);
Route::get('/leacture/cari', [App\Http\Controllers\LeactureController::class, 'search']);

Route::get('/prodi', [App\Http\Controllers\StudiprogramController::class, 'index']);
Route::get('/prodi/create', [App\Http\Controllers\StudiprogramController::class, 'create']);
Route::post('/prodi/store', [App\Http\Controllers\StudiprogramController::class, 'store']);
Route::get('/prodi/edit/{id}', [App\Http\Controllers\StudiprogramController::class, 'edit']);
Route::post('/prodi/update', [App\Http\Controllers\StudiprogramController::class, 'update']);
Route::get('/prodi/hapus/{id}', [App\Http\Controllers\StudiprogramController::class, 'destroy']);
Route::get('/prodi/cari', [App\Http\Controllers\StudiprogramController::class, 'search']);

Route::get('/kelas', [App\Http\Controllers\ClassController::class, 'index']);
Route::get('/kelas/create', [App\Http\Controllers\ClassController::class, 'create']);
Route::post('/kelas/store', [App\Http\Controllers\ClassController::class, 'store']);
Route::get('/kelas/edit/{id}', [App\Http\Controllers\ClassController::class, 'edit']);
Route::post('/kelas/update', [App\Http\Controllers\ClassController::class, 'update']);
Route::get('/kelas/hapus/{id}', [App\Http\Controllers\ClassController::class, 'destroy']);
Route::get('/kelas/cari', [App\Http\Controllers\ClassController::class, 'search']);

Route::get('/matakuliah', [App\Http\Controllers\SubjekcourseController::class, 'index']);
Route::get('/matakuliah/create', [App\Http\Controllers\SubjekcourseController::class, 'create']);
Route::post('/matakuliah/store', [App\Http\Controllers\SubjekcourseController::class, 'store']);
Route::get('/matakuliah/edit/{id}', [App\Http\Controllers\SubjekcourseController::class, 'edit']);
Route::post('/matakuliah/update', [App\Http\Controllers\SubjekcourseController::class, 'update']);
Route::get('/matakuliah/hapus/{id}', [App\Http\Controllers\SubjekcourseController::class, 'destroy']);
Route::get('/matakuliah/cari', [App\Http\Controllers\SubjekcourseController::class, 'search']);



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ______________________________________LOGIN CONTROLLER___________________________________________________________

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('home');})->middleware('auth');
  
Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'cekLogin:user'])->group(function () {
  
    Route::get('/home', [LoginController::class, 'index'])->name('home');
});
/*------------------------------------------
--------------------------------------------
All Super Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'cekLogin:super-admin'])->group(function () {
  
    Route::get('/super-admin/home', [LoginController::class, 'superAdminHome'])->name('super.admin.home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'cekLogin:manager'])->group(function () {
  
    Route::get('/manager/home', [LoginController::class, 'managerHome'])->name('manager.home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
