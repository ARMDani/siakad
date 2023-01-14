<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Session;
use Illuminate\Http\Request;


class GradeController extends Controller
{

    public function index()
    {
        $grade = Grade::paginate(10);
        return view('admin.grade.index', ['grades' => $grade]);
    }

    public function create()
    {
        return view('admin.grade.create');
    }

    public function store(Request $request)
    {
        Grade::insert([
            'name' => $request->name,
            'bobot' => $request->bobot,
            'poin' => $request->poin,
            'keterangan' => $request->keterangan,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Session::flash('tambah','Berhasil menambah data nilai');
        return redirect('/nilai');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $grade = Grade::where('id', $id)->get();
        return view('admin.grade.edit', ['grades' => $grade]);
    }

    public function update(Request $request)
    {
        Grade::where('id', $request->id)->update([
            'name' => $request->name,
            'bobot' => $request->bobot,
            'poin' => $request->poin,
            'keterangan' => $request->keterangan,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Session::flash('edit','Berhasil mengedit data nilai');
        return redirect('/nilai_grade');
    }

    public function destroy($id)
    {
        Grade::where('id', $id)->delete();
        Session::flash('hapus','Berhasil menghapus data nilai');
        return redirect('/nilai_grade');
    }
}
