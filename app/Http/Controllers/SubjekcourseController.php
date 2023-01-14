<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject_Course;
use App\Models\Lecturer;
use Session;
use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\StudyFacultyImport;

class SubjekcourseController extends Controller
{
    public function index()
    {
        $course = Subject_Course::paginate(10);
        return view('admin.subject_course.index', ['course' => $course]);
    }
    public function create()
    {
        $leacture = Lecturer::get();
        //memanggil view create
        return view('admin.subject_course.create', [
            'leacture' => $leacture,
        ]);
    }
    public function store(Request $request)
    {
        Subject_Course::insert([
            'course_code' => $request->course_code,
            'name' => $request->name,
            'sk' => $request->sk,
            'semester' => $request->semester,
            'lecturer_id' => $request->lecturer_id,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Session::flash('tambah','Berhasil menambah data mata kuliah');
        return redirect('/matakuliah');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $courses = Subject_Course::where('id', $id)->get();
        $leacture = Lecturer::get();

        return view('admin.subject_course.edit', [
            'course' => $courses,
            'leacture' => $leacture,

        ]);
    }
    public function update(Request $request)
    {
        Subject_Course::where('id', $request->id)->update([
            'course_code' => $request->course_code,
            'name' => $request->name,
            'sk' => $request->sk,
            'semester' => $request->semester,
            'lecturer_id' => $request->lecturer_id,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Session::flash('edit','Berhasil mengedit data mata kuliah');
        return redirect('/matakuliah');
    }
    public function destroy($id)
    {
        Subject_Course::where('id', $id)->delete();
        Session::flash('hapus','Berhasil menghapus data mata kuliah');
        return redirect('/matakuliah');
    }
    public function search(Request $request)
    {
        $cari = $request->cari;
        $course = Subject_Course::where('course_code', 'like', "%" . $cari . "%")->orwhere('name', 'like', "%" . $cari . "%")->paginate(10);
        return view('admin.subject_course.index', ['course' =>  $course]);
    }
    public function export_excel()
    {
        return Excel::download(new StudentExport(), 'Data Fakultas.xlsx');
    }
    public function import_excel(Request $request)
    {
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_faculty',$nama_file);
 
		// import data
        try {
            Excel::import(new StudyFacultyImport, public_path('/file_faculty/'.$nama_file));
            Session()::flash('sukses','Data Siswa Berhasil Diimport!');
        } catch (\Throwable $th) {
            $request->session()->flash('error', 'Data fakultas gagal diimport');
        }
 
		// notifikasi dengan session
 
		// alihkan halaman kembali
		return redirect('/fakultas');
    }
}
