<?php

namespace App\Http\Controllers;

use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Study_Program;
use App\Models\Districts;
use App\Models\ClassModel;
use App\Models\Generations;

class StudentController extends Controller
{
    public function index()
    {


        // mengambil data dari tabel student
        $students = Student::paginate(10)->fragment('students');;

        // dd($student);

        // //Mengirim data Ke View 
        return view('admin.student.index', ['students' => $students]);
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
        Student::insert([
            'name' => $request->nama,
            'nim' => $request->nim,
            'gender' => $request->gender,
            'religion' => $request->agama,
            'study_program_id' => $request->program_studi,
            'districts_id' => $request->asal_daerah,
            'class_id' => $request->kelas,
            'generations_id' => $request->angkatan,
            'photo' => $request->foto,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        return redirect('/student');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

        $student = Student::where('id', $id)->get();
        return view('admin.student.edit', [
            'student' => $student,

        ]);
    }


    public function update(Request $request, $id)
    {
        Student::where('id', $request->id)->update([
            'name' => $request->nama,
            'nim' => $request->nim,
            'gender' => $request->gender,
            'religion' => $request->agama,
            'study_program_id' => $request->program_studi,
            'districts_id' => $request->asal_daerah,
            'class_id' => $request->kelas,
            'generations_id' => $request->angkatan,
            'photo' => $request->foto,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        return redirect('/student');
    }


    public function destroy($id)
    {
        Student::where('id', $id)->delete();
        return redirect('/student');
    }


    public function search(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $students = Student::where('nim', 'like', "%" . $cari . "%")->orwhere('name', 'like', "%" . $cari . "%")->paginate();

        // mengirim data pegawai ke view index
        return view('admin.student.index', ['students' => $students]);
    }
}
