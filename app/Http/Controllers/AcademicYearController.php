<?php

namespace App\Http\Controllers;

use App\Models\Academic_Year;
use App\Models\Bidding_Time;
use App\Models\Value_Input_Time;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{

    public function index()
    {
        $tahunakademik = Academic_Year::paginate(10)->fragment('prodi');;
        return view('admin.tahunakademik.index', ['tahunakademik' => $tahunakademik]);
    }


    public function create()
    {
        $value_input_time_id = Value_Input_Time::get();
        $bidding_time_id = Bidding_Time::get();
        //memanggil view create
        return view('admin.tahunakademik.create', [
            'value_input_time_id' => $value_input_time_id,
            'bidding_time_id' => $bidding_time_id,
        ]);
    }

    public function store(Request $request)
    {
        Academic_Year::insert([
            'name' => $request->name,
            'semester' => $request->semester,
            'value_input_time_id' => $request->value_input_time,
            'bidding_time_id' => $request->bidding_time_id,
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
        $prodi = Academic_Year::where('id', $id)->get();
        $study_faculty_id = Study_Faculty::get();
        return view('admin.tahunakademik.edit', [
            'prodi' => $prodi,
            'study_faculty_id' => $study_faculty_id,

        ]);
    }

    public function update(Request $request, $id)
    {
        Academic_Year::where('id', $request->id)->update([
            'code_prodi' => $request->code_prodi,
            'name' => $request->name,
            'study_faculty_id' => $request->study_faculty_id,
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }

    public function destroy($id)
    {
        Academic_Year::where('id', $id)->delete();
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
