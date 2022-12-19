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
        //mengambil data dari tabel student
        $student = Student::paginate(10);

        //Mengirim data Ke View 
        return view('admin.student.index', ['student' => $student]);
    }

    public function create()
    {

        $generations = Generations::get();
        $study_program = Study_Program::get();
        $districts = Districts::get();
        $class = ClassModel::get();
        //memanggil view create
        return view('admin.student.create', ['generations' => $generations, 'study_program' => $study_program, 'districts' => $districts, 'class' => $class]);
    }

    public function store(Request $request)
    {
        Student::insert([
            // 'id' => $request->no,
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
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
