<?php

namespace App\Http\Controllers;

use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Session;
use App\Models\Study_Program;
use App\Models\Districts;
use App\Models\ClassModel;
use App\Models\Generations;
use App\Exports\StudentExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{

    public function index()
    {
        // mengambil data dari tabel student
        $students = Student::paginate(10)->fragment('students');
        // dd($student);
        // //Mengirim data Ke View 
        return view('admin.student.index', ['student' => $students]);
    }
    public function create()
    {
        $generations = Generations::get();
        $study_program = Study_Program::get();
        $districts = Districts::get();
        $class = ClassModel::get();
        //memanggil view create
        return view('admin.student.create', [
            'generations' => $generations,
            'study_program' => $study_program,
            'districts' => $districts,
            'class' => $class
        ]);
    }
    public function store(Request $request)
    {
        $photo = null;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $photo = $filename;
        }

        $students = Student::insert([
            'name' => $request->nama,
            'nim' => $request->nim,
            'gender' => $request->gender,
            'religion' => $request->agama,
            'study_program_id' => $request->program_studi,
            'districts_id' => $request->asal_daerah,
            'class_id' => $request->kelas,
            'generations_id' => $request->angkatan,
            'photo' => $photo,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Session::flash('tambah','Berhasil menambah data mahasiswa');
        return redirect('/student');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {

        $student = Student::where('id', $id)->get();
        $generations = Generations::get();
        $study_program = Study_Program::get();
        $districts = Districts::get();
        $class = ClassModel::get();
        return view('admin.student.edit', [
            'student' => $student,
            'generations' => $generations,
            'study_program' => $study_program,
            'districts' => $districts,
            'class' => $class
        ]);
    }
    public function update(Request $request)
    {
        $photo = null;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $photo = $filename;
        }
        $students = Student::where('id', $request->id)->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'study_program_id' => $request->study_program_id,
            'districts_id' => $request->districts_id,
            'class_id' => $request->class_id,
            'generations_id' => $request->generations_id,
            'photo' => $photo,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Session::flash('edit','Berhasil mengedit data mahasiswa');
        return redirect('/student');
    }
    public function destroy($id)
    {
        Student::where('id', $id)->delete();
        Session::flash('hapus','Berhasil menghapus data mahasiswa');
        return redirect('/student');
    }
    public function search(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
        // mengambil data dari table pegawai sesuai pencarian data
        $students = Student::where('nim', 'like', "%" . $cari . "%")->orwhere('name', 'like', "%" . $cari . "%")->orwhere('districts_id', 'like', "%" . $cari . "%")->paginate(10);
        // dd($students);

        // mengirim data pegawai ke view index
        return view('admin.student.index', ['student' => $students]);
    }
    public function export_excel()
    {
        return Excel::download(new StudentExport(), 'Data Mahasiswa.xlsx');
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
