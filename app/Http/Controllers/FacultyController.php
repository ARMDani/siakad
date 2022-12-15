<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faculty;
use Session;
use App\Exports\FacultyExport;
use App\Imports\FacultyImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class FacultyController extends Controller
{

    public function index()
    {
        $faculty = DB::table('study_faculty')->paginate(4);
        //$post=post::find($id);
        // mengirim data pegawai ke view index
        return view('admin.faculty.index', ['study_faculty' => $faculty]);
    }

    public function create()
    {
        return view('tambah'); 
    }

    public function store(Request $request)
    {
        // insert data ke table pegawai
        DB::table('faculty')->insert([
            'code_faculty' => $request->code_faculty,
            'name' => $request->name
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/faculty');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $faculty = DB::table('faculty')->where('code_faculty', $id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('edit', ['faculty' => $faculty]);
    }

    public function update(Request $request, $id)
    {
        // update data pegawai
        DB::table('faculty')->where('code_faculty', $request->id)->update([
            'code_faculty' => $request->code_faculty,
            'name' => $request->name

        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/faculty');
    }

    public function destroy($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('faculty')->where('name', $id)->delete();

        // alihkan halaman ke halaman pegawai
        return redirect('/faculty');
    }
    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $faculty = DB::table('faculty')
            ->where('name', 'like', "%" . $cari . "%")
            ->paginate(4);

        // mengirim data pegawai ke view index
        return view('faculty', ['faculty' => $faculty]);
    }
    public function export_excel()
    {
        return Excel::download(new FacultyExport, 'faculty.xlsx');
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
        Excel::import(new FacultyImport, public_path('/file_faculty/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Data Faculty Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('/faculty');
    }
}
