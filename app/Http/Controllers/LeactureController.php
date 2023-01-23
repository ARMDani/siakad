<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Lecturer;
use App\Models\Study_Value;
use Illuminate\Http\Request;
use App\Models\Academic_Year;
use App\Models\Study_Program;
use App\Exports\LecturerExport;
use App\Imports\LecturerImport;
use App\Models\Academic_Advisor;
use App\Models\LectureScheduling;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class LeactureController extends Controller
{
    public function index()
    {
        $leacture = Lecturer::paginate(10);
        return view('admin.leacture.index', ['leacture' => $leacture]);
    }
    // --------------------------------------------------------------TAMPLAN Jadwal DOSEN -----------------------------------------------------------------
    public function indexdosen(Request $request)
    {
        $academic_year = Academic_Year::get();
        $username = Auth::user()->username;
        $lecturer = Lecturer::where('nidn', $username)->get();
        $jadwal = LectureScheduling::get();
        
        $dosen = $request->dosen_id;
        $tahun_akademik = $request->tahun_akademik_id ?? null;
        $dosenjadwal = LectureScheduling::
        select('lecture_schedulings.*')
        ->where('lecture_schedulings.academic_year_id', $tahun_akademik)
        ->where('lecture_schedulings.lecturer_id', $lecturer[0]->id)        
                ->get();

    return view('dosen.jadwal.index')->with([
        'academic_year' => $academic_year, 
        'tahun_akademik' => $tahun_akademik,
        'dosen' => $dosen,
        'dosenjadwal' => $dosenjadwal,
        'lecturer' => $lecturer
    ]);
    }
// -------------------------------------TAMPILAN PRODI DOSEN PENASEHAT AKADEMIK----------------------------------------------------
    public function indexprodidosen(){
        
     
        $leacture = Lecturer::select('*', DB::raw('(SELECT COUNT(academic_advisor.id ) 
        FROM academic_advisor 
        LEFT JOIN student 
        ON student.id = academic_advisor.student_id 
        WHERE academic_advisor.lecturer_id = lecturer.id) AS jumlah'))      
    ->paginate(10);
        return view('prodi.dosen.index', [
            'leacture' => $leacture,
           
    ]);

    }


    public function storedosen(Request $request)
    {
       
    }


    public function create()
    {
        $study_program = Study_Program::get();
        return view('admin.leacture.create', [
            'study_program' => $study_program,
        ]);
    }

    public function store(Request $request)
    {
        $photo = null;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $photo = $filename;
        }

        $leactures = Lecturer::insert([
            'name' => $request->name,
            'nidn' => $request->nidn,
            'study_program_id' => $request->program_studi,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'address' => $request->address,
            'photo' => $request->photo,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Session::flash('tambah','Berhasil menambah data Dosen');
        return redirect('/leacture');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $leacture = Lecturer::where('id', $id)->get();
        return view('admin.leacture.edit', [
            'leacture' => $leacture,
        ]);
    }

    public function update(Request $request)
    {
        $photo = null;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $photo = $filename;
        }
        Lecturer::where('id', $request->id)->update([
            'name' => $request->name,
            'nidn' => $request->nidn,
            'study_program_id' =>$request->study_program,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'address' => $request->address,
            'photo' => $request->photo,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Session::flash('edit','Berhasil mengedit data Dosen');
        return redirect('/leacture');
    }

    public function destroy($id)
    {
        Lecturer::where('id', $id)->delete();
        Session::flash('hapus','Berhasil menghapus data mahasiswa');
        return redirect('/student');
    }
    // ============================================SEARCH ADMIN===============================================================
    public function search(Request $request)
    {
      
        $cari = $request->cari;

        $leacture = Lecturer::where('nidn', 'like', "%" . $cari . "%")->orwhere('name', 'like', "%" . $cari . "%")->paginate(10);

        return view('admin.leacture.index', ['leacture' => $leacture]);
    }
// ===================================================SEARCH PRODI======================================================================
public function searchprodi(Request $request)
    {
      
        $cari = $request->cari;

        $leacture = Lecturer::where('nidn', 'like', "%" . $cari . "%")->orwhere('name', 'like', "%" . $cari . "%")->paginate(10);

        return view('prodi.dosen.index', ['leacture' => $leacture]);
    }

    public function export_excel()
    {
        return Excel::download(new LecturerExport(), 'Data Dosen.xlsx');
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
            Excel::import(new LecturerImport, public_path('/file_faculty/'.$nama_file));
            Session()::flash('sukses','Data Siswa Berhasil Diimport!');
        } catch (\Throwable $th) {
            $request->session()->flash('error', 'Data fakultas gagal diimport');
        }
 
		// notifikasi dengan session
 
		// alihkan halaman kembali
		return redirect('/fakultas');
    }
}
