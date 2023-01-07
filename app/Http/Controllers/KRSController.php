<?php

namespace App\Http\Controllers;

use App\Models\Academic_Year;
use App\Models\Generations;
use App\Models\Study_Value;
use PDF;
use Illuminate\Http\Request;

class KRSController extends Controller
{
    public function index(Request $request)
    {
        $academic_year = Academic_Year::get();
        $generations = Generations::get();

        $tahun_akademik = $request->tahun_akademik_id ?? null;
        $angkatan = $request->angkatan_id ?? null;
        $students = Study_Value::join('student', 'study_value.student_id', '=', 'student.id')
            ->where('study_value.academic_year_id', $tahun_akademik)
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
        // $params = ['tahun_akademik' =>  null];

        $tahun_akademik = $request->tahun_akademik_id ?? null;
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

    // Generate PDF
    public function createPDF() {
        // retreive all records from db
        $data = Study_Value::all();
        // share data to view
        view()->share('students',$data);
        $pdf = PDF::loadView('prodi.krs.pdf', compact('data'));
        // PDF::loadView('my-actual-view',compact('data'))->output();

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
      }

    public function store(Request $request)
    {
        $cari = $request->cari;
    }
 
    public function search(Request $request)
    {
    }
}
