<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Study_Value;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index(Request $request){
        // mengambil data dari tabel users dan menyimpannya pada variabel $users
        $student_id = $request->student_id;
        $academic_year = $request->academic_year_id;

        $jadwal  = Study_Value::select('academic_day.name as hari', 'academic_day.id as hari_id', 'student.name as mahasiswa', 'student.id as mahasiswa_id',  
        'subject_course.name as matakuliah', 'subject_course.id as matakuliah_id', 'class.name as kelas', 'class.id as kelas_id', 
        'lecture_schedulings.start_time as kuliah', 'lecture_schedulings.hour_over as selesai',
        'academic_room.name as ruangan', 'academic_room.id as raungan_id',
        'lecturer.name as dosen', 'lecturer.id as dosen_id',
        'study_value.assignment_value as nilai tugas',
        'study_value.uts_value as nilai uts',
        'study_value.uas_value as nilai uas',
        'study_value.final_score as nilai akhir',
        'grade.name as grade', 'grade.id as grade_id' )
                ->leftJoin('lecture_schedulings', 'study_value.lecture_schedulings_id', '=', 'lecture_schedulings.id')
                ->where('lecture_schedulings.academic_year_id', $academic_year)
                ->join('student', 'study_value.student_id', '=', 'student.id')
                ->where('study_value.student_id', $student_id)
                ->join('subject_course', 'lecture_schedulings.subject_course_id', '=', 'subject_course.id')
                ->join('academic_day', 'lecture_schedulings.academic_day_id', '=', 'academic_day.id')
                ->join('class', 'lecture_schedulings.class_id', '=', 'class.id')
                ->join('lecturer', 'lecture_schedulings.lecturer_id', '=', 'lecturer.id')
                ->join('academic_room', 'lecture_schedulings.academic_room_id', '=', 'academic_room.id')
                ->join('grade', 'study_value.grade_id', '=', 'grade.id')
                ->get();
        return response()->json([
            'message' => 'Get Data',
            'data' => $jadwal
                    
            ]);
}
}
