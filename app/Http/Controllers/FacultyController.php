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
        // // update data pegawai
        // DB::table('faculty')->where('code_faculty', $request->id)->update([
        //     'code_faculty' => $request->code_faculty,
        //     'name' => $request->name

        // ]);
        // // alihkan halaman ke halaman pegawai
        // return redirect('/faculty');
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
        // menghapus data pegawai berdasarkan id yang dipilih
        Study_Faculty::where('id', $id)->delete();

        // alihkan halaman ke halaman pegawai
        return redirect('/fakultas');
    }
    public function cari(Request $request)
    {
        // // menangkap data pencarian
        // $cari = $request->cari;

        // // mengambil data dari table pegawai sesuai pencarian data
        // $faculty = DB::table('faculty')
        //     ->where('name', 'like', "%" . $cari . "%")
        //     ->paginate(4);

        // // mengirim data pegawai ke view index
        // return view('faculty', ['faculty' => $faculty]);
    }
    public function export_excel()
    {
        // return Excel::download(new FacultyExport, 'faculty.xlsx');
        //dd($faculty);
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
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_faculty', $nama_file);

        // import data
        // Excel::import(new FacultyImport, public_path('/file_faculty/' . $nama_file));

        // // notifikasi dengan session
        // Session::flash('sukses', 'Data Faculty Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('/faculty');
    }
}
