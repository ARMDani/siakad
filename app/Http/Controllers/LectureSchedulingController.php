<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;
use App\Models\LectureScheduling;
use App\Models\Study_Program;
use App\Models\Subject_Course;

class LectureSchedulingController extends Controller
{
    public function index()
    {     
        $penjadwalankuliah = LectureScheduling::paginate(10)->fragment('penjadwalankuliah');;
     return view('prodi.penjadwalankuliah.index', ['penjadwalankuliah' => $penjadwalankuliah]);
        
    }
    public function create()
    {
        $subject_course = Subject_Course::get();
        $lecturer = Lecturer::get();
        $study_program = Study_Program::get();
        //memanggil view create
        return view('prodi.penjadwalankuliah.create', [
            'subject_course' => $subject_course,
            'lecturer' => $lecturer,
            
        ]);
    }
    public function store(Request $request)
    {
        LectureScheduling::insert([
            'subject_course_id' => $request->subject_course,
            'lecture_hours' => $request->lecture_hours,
            'lecturer_id' => $request->lecturer,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        return redirect('/penjadwalan');
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
