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

// ______________________________________LOGIN CONTROLLER___________________________________________________________

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();


Route::middleware(['auth', 'cekLogin:user'])->group(function () {

    Route::get('/home', [LoginController::class, 'index'])->name('home');
});


Route::get('/home', [App\Http\Controllers\LoginController::class, 'index']);

Route::get('/fakultas', [App\Http\Controllers\FacultyController::class, 'index'])->middleware('auth');
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

Route::get('/leacture', [App\Http\Controllers\LeactureController::class, 'index'])->middleware('auth');
Route::get('/leacture/create', [App\Http\Controllers\LeactureController::class, 'create']);
Route::post('/leacture/store', [App\Http\Controllers\LeactureController::class, 'store']);
Route::get('/leacture/edit/{id}', [App\Http\Controllers\LeactureController::class, 'edit']);
Route::post('/leacture/update', [App\Http\Controllers\LeactureController::class, 'update']);
Route::get('/leacture/hapus/{id}', [App\Http\Controllers\LeactureController::class, 'destroy']);
Route::get('/leacture/cari', [App\Http\Controllers\LeactureController::class, 'search']);

Route::get('/prodi', [App\Http\Controllers\StudiprogramController::class, 'index'])->middleware('auth');
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

Route::get('/ruangan', [App\Http\Controllers\RoomController::class, 'index']);
Route::get('/ruangan/create', [App\Http\Controllers\RoomController::class, 'create']);
Route::post('/ruangan/store', [App\Http\Controllers\RoomController::class, 'store']);
Route::get('/ruangan/edit/{id}', [App\Http\Controllers\RoomController::class, 'edit']);
Route::post('/ruangan/update', [App\Http\Controllers\RoomController::class, 'update']);
Route::get('/ruangan/hapus/{id}', [App\Http\Controllers\RoomController::class, 'destroy']);
Route::get('/ruangan/cari', [App\Http\Controllers\RoomController::class, 'search']);

Route::get('/tahun_akademik', [App\Http\Controllers\AcademicYearController::class, 'index']);
Route::get('/tahun_akademik/create', [App\Http\Controllers\AcademicYearController::class, 'create']);
Route::post('/tahun_akademik/store', [App\Http\Controllers\AcademicYearController::class, 'store']);
Route::get('/tahun_akademik/edit/{id}', [App\Http\Controllers\AcademicYearController::class, 'edit']);
Route::post('/tahun_akademik/update', [App\Http\Controllers\AcademicYearController::class, 'update']);
Route::get('/tahun_akademik/hapus/{id}', [App\Http\Controllers\AcademicYearController::class, 'destroy']);
Route::get('/tahun_akademik/cari', [App\Http\Controllers\AcademicYearController::class, 'search']);


Route::get('/sksmhs', [App\Http\Controllers\SksmhsController::class, 'index']);
Route::get('/sksmhs/create', [App\Http\Controllers\SksmhsController::class, 'create']);
Route::post('/sksmhs/store', [App\Http\Controllers\SksmhsController::class, 'store']);
Route::get('/matakuliah/edit/{id}', [App\Http\Controllers\SksmhsController::class, 'edit']);
Route::post('/matakuliah/update', [App\Http\Controllers\SksmhsController::class, 'update']);
Route::get('/matakuliah/hapus/{id}', [App\Http\Controllers\SksmhsController::class, 'destroy']);
Route::get('/matakuliah/cari', [App\Http\Controllers\SksmhsController::class, 'search']);

// ---------------------------------------penjadwalan kuliah-------------------------------------------------------
Route::get('/penjadwalan', [App\Http\Controllers\LectureSchedulingController::class, 'index']);
Route::post('/penjadwalan', [App\Http\Controllers\LectureSchedulingController::class, 'index']);
Route::get('/penjadwalan/create/{tahun_akademik}', [App\Http\Controllers\LectureSchedulingController::class, 'create']);
Route::post('/penjadwalan/store', [App\Http\Controllers\LectureSchedulingController::class, 'store']);
Route::get('/penjadwalan/edit/{id}', [App\Http\Controllers\LectureSchedulingController::class, 'edit']);
Route::post('/penjadwalan/update', [App\Http\Controllers\LectureSchedulingController::class, 'update']);
Route::get('/penjadwalankuliah/hapus/{id}', [App\Http\Controllers\LectureSchedulingController::class, 'destroy']);
Route::get('/penjadwalan/cari', [App\Http\Controllers\LectureSchedulingController::class, 'search']);

// -----------------------------------------KRS Prodi ----------------------------------------------------------------------
Route::get('/krs', [App\Http\Controllers\KRSController::class, 'index']);
Route::get('/krs/create', [App\Http\Controllers\KRSController::class, 'create']);
Route::post('/krs/store', [App\Http\Controllers\KRSController::class, 'store']);
Route::get('/krs/edit/{id}', [App\Http\Controllers\KRSController::class, 'edit']);
Route::post('/krs/update', [App\Http\Controllers\KRSController::class, 'update']);
Route::get('/krs/hapus/{id}', [App\Http\Controllers\KRSController::class, 'destroy']);
Route::get('/krs/cari', [App\Http\Controllers\KRSController::class, 'search']);

// ---------------------------------------KRS Mahasiswa-------------------------------------------------------
Route::get('/krsmahasiswa', [App\Http\Controllers\KRSController::class, 'indexmahasiswa']);
Route::get('/krsmahasiswa/create', [App\Http\Controllers\krsmahasiswaController::class, 'create']);
Route::post('/krsmahasiswa/store', [App\Http\Controllers\krsmahasiswaController::class, 'store']);
Route::get('/krsmahasiswa/edit/{id}', [App\Http\Controllers\krsmahasiswaController::class, 'edit']);
Route::post('/krsmahasiswa/update', [App\Http\Controllers\krsmahasiswaController::class, 'update']);
Route::get('/krsmahasiswa/hapus/{id}', [App\Http\Controllers\krsmahasiswaController::class, 'destroy']);
Route::get('/krsmahasiswa/cari', [App\Http\Controllers\KRSController::class, 'search']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
