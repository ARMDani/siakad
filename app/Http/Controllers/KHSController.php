<?php

namespace App\Http\Controllers;

use App\Models\Generations;
use App\Models\Study_Value;
use Illuminate\Http\Request;
use App\Models\Academic_Year;
use App\Models\Grade;
use App\Models\LectureScheduling;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;


class KHSController extends Controller
{
    public function index(Request $request){
        $academic_year = Academic_Year::get();
        $generations = Generations::get();
        $tahun_akademik = $request->tahun_akademik_id ?? null;
        $angkatan = $request->angkatan_id ?? null;

        $khs = Study_Value::join('student', 'study_value.student_id', '=', 'student.id')
            ->where('study_value.lecture_schedulings_id', $tahun_akademik)
            ->where('student.generations_id', $angkatan)
            ->orderBy('student.nim', 'ASC')
            ->get();


        return view('prodi.khs.index')->with ([
            'academic_year' => $academic_year,
            'academic_year' => $academic_year,
            'angkatan' => $angkatan,
            'khs' => $khs,
            'generations' => $generations,
            'tahun_akademik' => $tahun_akademik
        ]);
    }
    public function indexmahasiswa(Request $request)
    {
        $data = Study_Value::get();
        $academic_year = Academic_Year::get();
        $username = Auth::user()->username;
        $mahasiswa = Student::where('nim', $username)->first();
        $academic_year = Academic_Year::get();
        // $params = ['tahun_akademik' =>  null];
        $tahun_akademik = $request->tahun_akademik_id ?? null;
        $khsmahasiswa = Study_Value::leftJoin('lecture_schedulings', 'study_value.lecture_schedulings_id', '=', 'lecture_schedulings.id')
        ->where('lecture_schedulings.academic_year_id', $tahun_akademik )
        ->where('student_id', $mahasiswa->id)                
                ->get();
        
        // $tahun_akademik = Academic_Year::find($request->tahun_akademik_id);
        // $params = ['tahun_akademik' => $tahun_akademik];
            
        return view('mahasiswa.khs.indexmhs')->with([
            'academic_year' => $academic_year, 
            'khsmahasiswa' => $khsmahasiswa,
            'tahun_akademik' => $tahun_akademik,
            'data' => $data
            ]);
    }
    
    public function storemahasiswa(Request $request)
    {
        $username = Auth::user()->username;
        $mahasiswa = Student::where('nim', $username)->first();
        $listjadwal = $request->pilih;
     
        foreach ($listjadwal as $i => $id_lecture_schedulings) { 
            $pilih = Study_Value::where('lecture_schedulings_id', $id_lecture_schedulings)
            ->where('student_id', $mahasiswa->id)
            ->first();

            if(!$pilih){
               Study_Value::insert([
                    'student_id' => $mahasiswa->id,
                    'lecture_schedulings_id' =>$id_lecture_schedulings,
               
                    'created_by' => 1,
                    'updated_by' => 1
                ]);
            }
        }
        
        return redirect('/krsmahasiswa')->with('status', 'Data Berhasil Ditambahkan !');
       
        $cari = $request->cari;
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
    public function search(Request $request)
    {
    }

}
