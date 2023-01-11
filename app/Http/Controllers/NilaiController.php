<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Study_Value;
use App\Models\Generations;
use Illuminate\Http\Request;
use App\Models\Academic_Year;
use App\Models\LectureScheduling;
use App\Models\Subject_Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        $tahun_akademik = Academic_Year::find($request->tahun_akademik_id);
        $academic_year = Academic_Year::get();
        $tahun_akademik = $request->tahun_akademik_id ?? null;
        $mahasiswa = LectureScheduling::leftJoin('subject_course', 'lecture_schedulings.subject_course_id', '=', 'subject_course.id')
        ->select('*', DB::raw('(SELECT COUNT(study_value.id ) 
                    FROM study_value 
                    LEFT JOIN lecture_schedulings 
                    ON lecture_schedulings.id = study_value.lecture_schedulings_id 
                    WHERE lecture_schedulings.subject_course_id = subject_course.id) AS jumlah'))
        ->where('lecture_schedulings.academic_year_id', $tahun_akademik )       
                ->get();
        

        return view('prodi.input_nilai.index')->with([
            'academic_year' => $academic_year, 
            'mahasiswa' => $mahasiswa,
            'tahun_akademik' => $tahun_akademik,

           
              ]);
    }
    public function indexnilai(Request $request)
    {
        $matakuliah = $request->segment(3);
        $student = Student::get();
              
        $lecture_scheduling = LectureScheduling::get();
        $mahasiswas = Study_Value::leftJoin('lecture_schedulings', 'study_value.lecture_schedulings_id', '=', 'lecture_schedulings.id')  
        ->where('lecture_schedulings.subject_course_id', $matakuliah )           
                ->get();
         

        return view('prodi.input_nilai.input_nilai')->with([ 
            'lecture_scheduling' => $lecture_scheduling,
            'mahasiswas' => $mahasiswas, 
            'student' => $student,
            'matakuliah' => $matakuliah         
              ]);
    }
    public function update(Request $request, $id)
    {
    //   
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
    //  ksmhs');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
