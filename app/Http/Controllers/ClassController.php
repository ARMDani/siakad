<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use App\Exports\ClassExport;
use App\Imports\StudyFacultyImport;

class ClassController extends Controller
{
    public function index()
    {
        $class = ClassModel::paginate(10);
        return view('admin.class.index', ['class' => $class]);
    }
    public function create()
    {
        return view('admin.class.create');
    }
    public function store(Request $request)
    {
        ClassModel::insert([
            'name' => $request->name,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Session::flash('tambah','Berhasil menambah data kelas');
        return redirect('/kelas');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $class = ClassModel::where('id', $id)->get();
        return view('admin.class.edit', ['class' => $class]);
    }
    public function update(Request $request)
    {
        ClassModel::where('id', $request->id)->update([
            'name' => $request->name,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Session::flash('edit','Berhasil mengedit data kelas');
        return redirect('/kelas');
    }
    public function destroy($id)
    {
        ClassModel::where('id', $id)->delete();
        Session::flash('hapus','Berhasil menghapus data kelas');
        return redirect('/kelas');
    }
    public function search(Request $request)
    {
        $cari = $request->cari;
        $class = ClassModel::where('id', 'like', "%" . $cari . "%")->orwhere('name', 'like', "%" . $cari . "%")->paginate(10);
        return view('admin.class.index', ['class' =>  $class]);
    }
    public function export_excel()
    {
        return Excel::download(new ClassExport(), 'Kelas.xlsx');
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
