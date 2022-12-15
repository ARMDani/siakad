<?php

namespace App\Http\Controllers;

use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        //mengambil data dari tabel student
        $student = DB::table('student')->get();

        //Mengirim data Ke View 
        return view('admin.student.index', ['student' => $student]);
    }

    public function create()
    {
        //memanggil view create
        return view('admin.student.create');
    }


    public function store(Request $request)
    {
        DB::table('student')->insert([
            'id' => $request->no,
            'name' => $request->nama,
            'nim' => $request->nim,
            'gender' => $request->jenis_kelamin,
            'religion' => $request->agama,
            'study_program_id' => $request->program_studi,
            'districts_id' => $request->asal_daerah,
            'class_id' => $request->kelas,
            'generations_id' => $request->angkatan,
            'photo' => $request->photo
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
