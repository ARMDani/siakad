<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Study_Faculty;
use App\Exports\FacultyExport;
use Session;
use App\Imports\StudyFacultyImport;
use App\Http\Controllers\Controller;
use App\Imports\ImportFakulti;
use Maatwebsite\Excel\Facades\Excel;


class FacultyController extends Controller
{
    public function index()
    {
        $faculty = Study_Faculty::paginate(10);
        return view('admin.faculty.index', ['faculty' => $faculty]);
    }
    public function create()
    {
        return view('admin.faculty.create');
    }
    public function store(Request $request)
    {
        Study_Faculty::insert([
            'code_faculty' => $request->code_faculty,
            'name' => $request->name,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Session::flash('tambah','Berhasil menambah data fakultas');
        return redirect('/fakultas');
    }
    public function show()
    {
        //
    }
    public function edit($id)
    {
        $faculty = Study_Faculty::where('id', $id)->get();
        return view('admin.faculty.edit', ['faculty' => $faculty]);
    }

    public function update(Request $request)
    {
        Study_Faculty::where('id', $request->id)->update([
            'code_faculty' => $request->code_faculty,
            'name' => $request->name,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        // Session::flash('edit','Berhasil mengedit data fakultas');
        return redirect('/fakultas')->with('edit', 'Berhasil mengedit data fakultas');
    }
    public function destroy($id)
    {
        Study_Faculty::where('id', $id)->delete();
        Session::flash('hapus','Berhasil menghapus data fakultas');
        return redirect('/fakultas');
    }
    public function search(Request $request)
    {
        $cari = $request->cari;
        $faculty = Study_Faculty::where('code_faculty', 'like', "%" . $cari . "%")->orwhere('name', 'like', "%" . $cari . "%")->paginate(10);
        return view('admin.faculty.index', ['faculty' =>  $faculty]);
    }
    public function export_excel()
    {
        return Excel::download(new FacultyExport(), 'Data Fakultas.xlsx');
    }
    public function import_excel(Request $request){
        Excel::import(new ImportFakulti, $request->file('file')->store('files'));
        Session::flash('import','Berhasil mengimport data fakultas');
        return redirect()->back();
    }
}
