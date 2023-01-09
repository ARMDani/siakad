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

class KRSController extends Controller
{
    public function index(Request $request)
    {
        $academic_year = Academic_Year::get();
        $generations = Generations::get();

        $tahun_akademik = $request->tahun_akademik_id ?? null;
        $angkatan = $request->angkatan_id ?? null;
        $students = Study_Value::join('student', 'study_value.student_id', '=', 'student.id')
            ->where('study_value.lecture_schedulings_id', $tahun_akademik)
            ->where('student.generations_id', $angkatan)
            ->orderBy('student.nim', 'ASC')
            ->get();

        return view('prodi.krs.index')->with([
            'academic_year' => $academic_year,
            'generations' => $generations,
            'angkatan' => $angkatan,
            'students' => $students,
            'tahun_akademik' => $tahun_akademik
        ]);
    }
    public function indexmahasiswa(Request $request)
    {
        $academic_year = Academic_Year::get();
        $username = Auth::user()->username;
        $mahasiswa = Student::where('nim', $username)->get();
        $mahasiswas = Student::where('nim', $username)->first();
        $tahun_akademik= Academic_Year::get();
        
        // $params = ['tahun_akademik' =>  null];
        $tahun_akademik = $request->tahun_akademik_id ?? null;
        $krsmahasiswa = Study_Value::join('lecture_schedulings', 'study_value.lecture_schedulings_id', '=', 'lecture_schedulings.id')
        ->where('lecture_schedulings.academic_year_id', $tahun_akademik )
        ->where('student_id', $mahasiswas->id)                
                ->get();

        // $data = Study_Value::get();
        // $academic_year = Academic_Year::get();
        // $username = Auth::user()->username;
        // $mahasiswa = Student::where('nim', $username)->first();
        // $academic_year = Academic_Year::get();
        // // $params = ['tahun_akademik' =>  null];
        // $tahun_akademik = $request->tahun_akademik_id ?? null;
        // $krsmahasiswa = Study_Value::leftJoin('lecture_schedulings', 'study_value.lecture_schedulings_id', '=', 'lecture_schedulings.id')
        // ->where('lecture_schedulings.academic_year_id', $tahun_akademik )
        // ->where('student_id', $mahasiswa->id)                
        //         ->get();
        
        // $tahun_akademik = Academic_Year::find($request->tahun_akademik_id);
        // $params = ['tahun_akademik' => $tahun_akademik];
            
        return view('mahasiswa.krs.indexmhs')->with([
            'academic_year' => $academic_year, 
            'krsmahasiswa' => $krsmahasiswa,
            'tahun_akademik' => $tahun_akademik,
            'mahasiswa' => $mahasiswa
            
            ]);
    }
    public function createmahasiswa(Request $request)
    
        {   
                        
            $tahun_akademik = $request->segment(3);
            $academic_year = Academic_Year::get();
            $mahasiswa = LectureScheduling::where('academic_year_id', $tahun_akademik)->get();
            
          
                
            return view('mahasiswa.krs.create')->with([
                'academic_year' => $academic_year, 
                'mahasiswa' => $mahasiswa,
                'tahun_akademik' => $tahun_akademik
            ]);
           
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
    public function destroymahasiswa($id)
    {
        Study_Value::where('id', $id)->delete();
        return redirect('/krsmahasiswa');
}
    public function search(Request $request)
    {
    }
}
