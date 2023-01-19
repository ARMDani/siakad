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
        return redirect('/penjadwalan')->with('success', 'Data Berhasil Ditambahkan !');
       
    }

    public function edit($id){
        $academic_year = Academic_Year::where('id' , $id)->get();
        $subject_course = Subject_Course::where('id' , $id)->get();
        $lecturer = Lecturer::where('id' , $id)->get();
        $class = ClassModel::where('id' , $id)->get();
        $academic_day = Academic_Day::where('id' , $id)->get();
        $academic_room = Academic_Room::where('id' , $id)->get();
        //memanggil view create
        return view('prodi.penjadwalankuliah.edit', [
            'academic_year' => $academic_year,
            'subject_course' => $subject_course,
            'lecturer' => $lecturer,
            'class' => $class,
            'academic_day' => $academic_day,
            'academic_room' => $academic_room,
        ]);

    }
    public function update(Request $request){


    }
    public function show($id)
    {
    //
    }
    public function destroy($id)
    {
        try {
            LectureScheduling::where('id', $id)->delete();
            return redirect('/penjadwalan')->with('success', 'Berhasil Menghapus Data');
          }
          
          //catch exception
          catch(\Exception $e) {
            return redirect('/penjadwalan')->with('error', 'Data Sedang Digunakan');
          }
        
    }
    public function search(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
        $tahun_akademik = $request->tahun_akademik_id ?? null;
        // mengambil data dari table pegawai sesuai pencarian data
        $matakuliah = LectureScheduling::  $matakuliah = LectureScheduling::where('lecture_schedulings.academic_year_id', $tahun_akademik)                
        ->where('select count(*) as subject_course from lecture_schedlings where subject_course.name,', 'like', "%" . $cari . "%")->paginate(10);
        // dd($students);
  
        // mengirim data pegawai ke view index
        return view('prodi.penjadwalankuliah.index', ['matakuliah' => $matakuliah]);
    }
}
