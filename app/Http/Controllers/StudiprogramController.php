<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Study_Program;
use App\Models\Study_Faculty;

class StudiprogramController extends Controller
{
    public function index()
    {
        $prodi = Study_Program::paginate(10)->fragment('prodi');;
        return view('admin.studi_program.index', ['prodi' => $prodi]);
    }
    public function create()
    {
        $study_faculty_id = Study_Faculty::get();
        //memanggil view create
        return view('admin.studi_program.create', [
            'study_faculty_id' => $study_faculty_id,
        ]);
    }
    public function store(Request $request)
    {
        Study_Program::insert([
            'code_prodi' => $request->code_prodi,
            'name' => $request->name,
            'study_faculty_id' => $request->study_faculty,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        return redirect('/prodi');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $prodi = Study_Program::where('id', $id)->get();
        $study_faculty_id = Study_Faculty::get();
        return view('admin.studi_program.edit', [
            'prodi' => $prodi,
            'study_faculty_id' => $study_faculty_id,

        ]);
    }

    public function update(Request $request)
    {
        Study_Program::where('id', $request->id)->update([
            'code_prodi' => $request->code_prodi,
            'name' => $request->name,
            'study_faculty_id' => $request->study_faculty_id,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        return redirect('/prodi');
    }

    public function destroy($id)
    {
        Study_Program::where('id', $id)->delete();
        return redirect('/prodi');
    }
    public function search(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $prodi = Study_Program::where('code_prodi', 'like', "%" . $cari . "%")->orwhere('name', 'like', "%" . $cari . "%")->paginate(10);

        // mengirim data pegawai ke view index
        return view('admin.studi_program.index', ['prodi' => $prodi]);
    }
}
