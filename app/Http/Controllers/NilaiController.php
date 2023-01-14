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
        $student_id = $request->student;
        $data_nilai = $request->nilai;
        $jadwal_id = $request->jadwal;
        $matakuliah =  $request->matakuliah;

        foreach ($data_nilai as $student_id => $data_nilaimhs) {

            // $grade_id = $data_nilaimhs['grade_id'];
            $assignment_value = $data_nilaimhs['assignment_value'];
            $uts_value = $data_nilaimhs['uts_value'];
            $uas_value = $data_nilaimhs['uas_value'];
            $id_nilaimhs = $data_nilaimhs['id_nilaimhs'];

            //(nilai uts * 35 /100) + (nilai uas * 35 /100) + (nilai tugas * 30 / 100) = nilai_akhir
            $nilai_akhir = ($assignment_value * 35 / 100) + ($uts_value * 35 / 100) + ($uas_value * 35 / 100);
            if ($nilai_akhir >= 86 ){
                $grade_id = 1;
            }elseif ($nilai_akhir >= 80){
                $grade_id = 2;

            }elseif ($nilai_akhir >= 76){
                $grade_id = 3;

            }elseif ($nilai_akhir >= 71){
                $grade_id = 4;

            }elseif ($nilai_akhir >= 66){
                $grade_id = 5;

            }elseif ($nilai_akhir >= 61){
                $grade_id = 6;

            }elseif ($nilai_akhir >= 56){
                $grade_id = 7;

            }elseif ($nilai_akhir >= 41){
                $grade_id = 8;

            }else{
                $grade_id = 9;
            }

            if ($id_nilaimhs !== null) {
                $nilaimhs = Study_Value::where('id', $id_nilaimhs)
                ->where('lecture_schedulings_id', $jadwal_id)
                ->update([
                    'grade_id' => $grade_id,
                    'assignment_value' => $assignment_value,
                    'uts_value' => $uts_value,
                    'uas_value' => $uas_value,
                    'updated_by' => Auth::user()->id
                ]);
            }
        }
        return redirect('/nilai/input_nilai/'.$matakuliah);
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
