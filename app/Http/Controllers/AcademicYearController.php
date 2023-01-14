<?php

namespace App\Http\Controllers;

use App\Models\Academic_Year;
use App\Models\Bidding_Time;
use App\Models\Study_Faculty;
use App\Models\Value_Input_Time;
use Session;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{

    public function index()
    {
        $academic_year = Academic_Year::paginate(10);

        return view('admin.Academic_Year.index', ['ta' => $academic_year]);
    }

    public function create()
    {
        //memanggil view create
        return view('admin.Academic_Year.create');
    }

    public function store(Request $request)
    {
        Academic_Year::insert([
            'name' => $request->name,
            'semester' => $request->semester,
            'start_time_value' => $request->start_time_value,
            'end_of_time_value' => $request->end_of_time_value,
            'start_time_bidding' => $request->start_time_bidding,
            'end_of_time_bidding' => $request->end_of_time_bidding,

            'created_by' => 1,
            'updated_by' => 1
        ]);
        Session::flash('tambah','Berhasil menambah data tahun akademik');
        return redirect('/tahun_akademik');
    }

    public function active($id, $status)
    {
        Academic_Year::where('id', $id)->update([
            'active' => $status,
        ]);
        return redirect('/tahun_akademik');
    }

    public function edit($id)
    {
        $academic_year = Academic_Year::where('id', $id)->get();
        return view('admin.Academic_Year.edit', ['academic_years' => $academic_year]);
    }

    public function update(Request $request)
    {
        Academic_Year::where('id', $request->id)->update([
            'name' => $request->name,
            'semester' => $request->semester,
            'start_time_value' => $request->start_time_value,
            'end_of_time_value' => $request->end_of_time_value,
            'start_time_bidding' => $request->start_time_bidding,
            'end_of_time_bidding' => $request->end_of_time_bidding,

            'created_by' => 1,
            'updated_by' => 1
        ]);
        Session::flash('edit','Berhasil mengedit data tahun akademik');
        return redirect('/tahun_akademik');
    }

    public function destroy($id)
    {
        Academic_Year::where('id', $id)->delete();
        Session::flash('hapus','Berhasil menghapus data tahun akademik');
        return redirect('/prodi');
    }
    public function search(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $prodi = Academic_Year::where('code_prodi', 'like', "%" . $cari . "%")->orwhere('name', 'like', "%" . $cari . "%")->paginate(10);

        // mengirim data pegawai ke view index
        return view('admin.tahunakademik.index', ['prodi' => $prodi]);
    }
}
