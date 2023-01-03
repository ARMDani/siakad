<?php

namespace App\Http\Controllers;

use App\Models\Study_Value;
use Illuminate\Http\Request;
use App\Models\Academic_Year;

class KRSController extends Controller
{
    public function indexmahasiswa(Request $request)
    {
       $academic_year = Academic_Year::get();
        // $params = ['tahun_akademik' =>  null];

        $tahun_akademik = $request->tahun_akademik_id ?? null;
            $mahasiswa = Study_Value::where('study_value.student_id', $tahun_akademik)                
                ->get();
        
        // $tahun_akademik = Academic_Year::find($request->tahun_akademik_id);
        // $params = ['tahun_akademik' => $tahun_akademik];
            
        return view('mahasiswa.krs.index')->with([
            'academic_year' => $academic_year, 
            'mahasiswa' => $mahasiswa,
            'tahun_akademik' => $tahun_akademik
            
            ]);
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
    }
    public function show()
    {
        //
    }
    public function edit($id)
    {
    }

    public function update(Request $request)
    {
    }
    public function destroy($id)
    {
    }
    public function search(Request $request)
    {
    }
}
