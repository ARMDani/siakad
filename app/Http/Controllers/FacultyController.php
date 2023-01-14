<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Study_Faculty;
use Session;
use App\Exports\FacultyExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\StudyFacultyImport;

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
        Session::flash('edit','Berhasil mengedit data fakultas');
        return redirect('/fakultas');
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
