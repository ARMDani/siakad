<?php

namespace App\Http\Controllers;

use App\Models\nilaimhs;
use App\Models\Student;
use App\Models\Generations;
use App\Models\Study_Value;
use Illuminate\Http\Request;
use App\Models\Academic_Year;
use App\Models\Grade;
use App\Models\Subject_Course;
use App\Models\LectureScheduling;
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
        $grade = Grade::get();
              
        $lecture_scheduling = LectureScheduling::get();
        $mahasiswas = Study_Value::leftJoin('lecture_schedulings', 'study_value.lecture_schedulings_id', '=', 'lecture_schedulings.id')  
        ->select ('study_value.*')
        ->where('lecture_schedulings.subject_course_id', $matakuliah )    

                ->get();
        
         
        return view('prodi.input_nilai.input_nilai')->with([ 
            'grade' =>$grade,
            'lecture_scheduling' => $lecture_scheduling,
            'mahasiswas' => $mahasiswas, 
            'student' => $student,
            'matakuliah' => $matakuliah         
              ]);
    }
    public function update(Request $request, $id)
    {
        Study_Value::where('id', $request->id)->update([
            'grade_id' => $request->grade_id,
    
        ]);
        return redirect('/nilai/input_nilai/{matakuliah}');
    }
    // -------------------------------Transkip Nilai-------------------------------------------
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
        ->where('student_id', $mahasiswa->id)                
                ->get();
        
        // $tahun_akademik = Academic_Year::find($request->tahun_akademik_id);
        // $params = ['tahun_akademik' => $tahun_akademik];
            
        return view('mahasiswa.transkip_nilai.indexmhsnilai')->with([
            'academic_year' => $academic_year, 
            'khsmahasiswa' => $khsmahasiswa,
            'tahun_akademik' => $tahun_akademik,
            'data' => $data
            ]);
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

    public function store($id ,Request $request, )
    {
    $data = $request->all();
    $matakuliah = $request->matakuliah_id;
    $mahasiswas = Study_Value::leftJoin('lecture_schedulings', 'study_value.lecture_schedulings_id', '=', 'lecture_schedulings.id')  
        ->select ('study_value.*')
        ->where('lecture_schedulings.subject_course_id', $matakuliah )    

                ->get();
   
      $jumlah = count($data['assignment_value']);
      for($nilai = 0; $nilai < $jumlah; $nilai++){

        $Na = (($request->assignment_value[$nilai])*0.35)+(($request->uts_value[$nilai])*0.35)+(($request->uas_value[$nilai])*0.35);
     
        if($Na >= 86){
                $grade_id = 1;
            }elseif($Na >= 80 && $Na < 85){
                $grade_id = 2;
            }elseif($Na >= 76 && $Na < 79){
                $grade_id = 3;
            }elseif($Na >= 71 && $Na < 75){
                $grade_id = 4;
            }elseif($Na >= 66 && $Na < 70){
                $grade_id = 5;
            }elseif($Na >= 61 && $Na < 65){
                $grade_id = 6;
            }elseif($Na >= 56 && $Na < 60){
                $grade_id = 7;
            }elseif($Na >= 41 && $Na < 45){
                $grade_id = 8;
            }else{
                $grade_id = 9;
            }
            Study_Value::where('id', $request->id[$nilai])
                ->update([
                    'assignment_value' => $request->assignment_value[$nilai],
                    'uts_value' => $request->uts_value[$nilai],
                    'uas_value' => $request->uas_value[$nilai],
                    'final_score' => $Na,
                    'grade_id' => $grade_id
                ]);
     }
      
        return redirect('/nilai/input_nilai/'.$id)->with('status', 'Nilai Mahasiswa Telah Terinput !!!')->with([
               
            ]);
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
