<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Generations;
use Illuminate\Http\Request;
use App\Models\Academic_Advisor;
use Illuminate\Support\Facades\DB;

class AcademicAdvisorController extends Controller
{
    public function index(Request $request)
    {
        $dosen = $request->segment(2);
        $student = Student::get();
   
              
        $daftarmhs = Academic_Advisor::leftJoin('student', 'academic_advisor.student_id', '=', 'student.id')
        ->where('academic_advisor.lecturer_id', $dosen)
        ->get();
        // dd($daftarmhs);

    return view('prodi.penasehat_akademik.index')->with([
        'student' => $student,
        'daftarmhs' => $daftarmhs,
        'dosen' => $dosen,
      
          ]);
    }
    // ============================================Tambah Data MAHASISWA PERWALIAN=========================================================
    public function create(Request $request)
    {
        $generations = Generations::get();
        $dosen = $request->segment(3);
        $angkatan = $request->angkatan_id ?? null;
        $mahasiswa = Student::where('student.generations_id', $angkatan)
        ->select('*', DB::raw('(SELECT COUNT(DISTINCT academic_year_id)
        FROM study_value 
        LEFT JOIN lecture_schedulings 
        ON lecture_schedulings.id = study_value.lecture_schedulings_id 
        WHERE study_value.student_id = student.id) AS semester'))
        ->get();
        return view('prodi.penasehat_akademik.create', [
            'mahasiswa' => $mahasiswa,
            'dosen' => $dosen,
            'angkatan' => $angkatan,
            'generations' => $generations
        ]);
    }
    public function store(Request $request)
    {
       $dosen = $request->segment(2);
       $pa = Academic_Advisor::insert([
           'lecturer_id' => $request->lecturer,
           'student_id' => $request->student
       ]);
        return redirect('/leacture')->with('status', 'Berhasil Menambah Data Mahasiswa Perwalian');
    }
}
