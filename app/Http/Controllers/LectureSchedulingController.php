<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\ClassModel;
use App\Models\Academic_Day;
use Illuminate\Http\Request;
use App\Models\Academic_Room;
use App\Models\Academic_Year;
use App\Models\Subject_Course;
use App\Models\LectureScheduling;
use Illuminate\Support\Facades\DB;

class LectureSchedulingController extends Controller
{
      public function index(Request $request)
    {
        $academic_year = Academic_Year::get();
        $tahun_akademik = $request->tahun_akademik_id ?? null;
        $matakuliah = LectureScheduling::where('lecture_schedulings.academic_year_id', $tahun_akademik)                
                ->get();
            
        return view('prodi.penjadwalankuliah.index')->with([
            'academic_year' => $academic_year, 
            'matakuliah' => $matakuliah,
            'tahun_akademik' => $tahun_akademik
            
            ]);
    }
    public function create()
    {
        $academic_year = Academic_Year::get();
        $subject_course = Subject_Course::get();
        $lecturer = Lecturer::get();
        $class = ClassModel::get();
        $academic_day = Academic_Day::get();
        $academic_room = Academic_Room::get();
        //memanggil view create
        return view('prodi.penjadwalankuliah.create', [
            'academic_year' => $academic_year,
            'subject_course' => $subject_course,
            'lecturer' => $lecturer,
            'class' => $class,
            'academic_day' => $academic_day,
            'academic_room' => $academic_room,
            
        ]);
    }
    public function store(Request $request)
    {
        LectureScheduling::insert([
           
            'academic_year_id' => $request->academic_year,
            'subject_course_id' => $request->subject_course,
            'lecturer_id' => $request->lecturer,
            'class_id' => $request->class,
            'academic_day_id' => $request->academic_day,
            'start_time' => $request->start_time,
            'hour_over' => $request->hour_over,
            'academic_room_id' => $request->academic_room,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        return redirect('/penjadwalan')->with('status', 'Data Berhasil Ditambahkan !');
       
    }
    public function show($id)
    {
    //
    }
    public function destroy($id)
    {
        LectureScheduling::where('id', $id)->delete();
        return redirect('/penjadwalan');
}
    }
