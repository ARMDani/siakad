<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use App\Models\Study_Faculty;
use App\Models\Study_Program;
use App\Models\Subject_Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        $username = Auth::user()->username;
        $lecturer = Lecturer::where('nidn', $username)->get();

        $username = Auth::user()->username;
        $mahasiswa = Student::where('nim', $username)->get();

        $fakultas = Study_Faculty::
        select('*', DB::raw('(SELECT COUNT(study_faculty.id ) 
        FROM study_faculty ) AS jumlah'))->get();

        $programstudi = Study_Program::
        select('*', DB::raw('(SELECT COUNT(study_program.id ) 
        FROM study_program ) AS nilai'))->get();

        $dosen = Lecturer::
        select('*', DB::raw('(SELECT COUNT(lecturer.id ) 
        FROM lecturer ) AS nilai'))->get();

        $mahasiswas = Student::
        select('*', DB::raw('(SELECT COUNT(student.id ) 
        FROM student ) AS nilai'))->get();

        $matakuliah = Subject_Course::
        select('*', DB::raw('(SELECT COUNT(subject_course.id ) 
        FROM subject_course ) AS nilai'))->get();
        
        return view('home')->with([
            'lecturer' => $lecturer,
            'mahasiswa' => $mahasiswa,
            'fakultas' => $fakultas,
            'programstudi' => $programstudi,
            'dosen' => $dosen,
            'mahasiswas' => $mahasiswas,
            'matakuliah' => $matakuliah
        ]);
    }
}
