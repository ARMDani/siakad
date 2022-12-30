<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Study_Faculty;
use Session;
use App\Exports\FacultyExport;
use App\Imports\FacultyImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

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
        return redirect('/fakultas');
    }
    public function destroy($id)
    {
        Study_Faculty::where('id', $id)->delete();
        return redirect('/fakultas');
    }
    public function search(Request $request)
    {
        $cari = $request->cari;
        $faculty = Study_Faculty::where('code_faculty', 'like', "%" . $cari . "%")->orwhere('name', 'like', "%" . $cari . "%")->paginate(10);
        return view('admin.faculty.index', ['faculty' =>  $faculty]);
    }
}
