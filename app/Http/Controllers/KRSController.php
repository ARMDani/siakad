<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Sksmhs;
use App\Models\Student;
use PDF;
use App\Models\Generations;
use App\Models\Study_Value;
use Illuminate\Http\Request;
use App\Models\Academic_Year;
use App\Models\LectureScheduling;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class KRSController extends Controller
{
    public function index(Request $request)
    {
        $academic_year = Academic_Year::get();
        $generations = Generations::get();

        $tahun_akademik = $request->tahun_akademik_id ?? null;
        $angkatan = $request->angkatan_id ?? null;
        $krs = Study_Value::join('student', 'study_value.student_id', '=', 'student.id')
        ->select('student.*')
        ->where('student.generations_id', $angkatan)
        ->select('study_value.*')
        ->join('lecture_schedulings', 'study_value.lecture_schedulings_id', '=', 'lecture_schedulings.id')
        ->where('lecture_schedulings.academic_year_id', $tahun_akademik)
            ->orderBy('student.id', 'desc')
            ->get();

        return view('prodi.krs.index')->with([
            'academic_year' => $academic_year,
            'generations' => $generations,
            'angkatan' => $angkatan,
            'krs' => $krs,
            'tahun_akademik' => $tahun_akademik
        ]);
    }
    public function indexmahasiswa(Request $request)
    {
        $academic_year = Academic_Year::get();
        $username = Auth::user()->username;
        $mahasiswa = Student::where('nim', $username)->get();

      
        $tahun_akademik= Academic_Year::get();
        
        $tahun_akademik = $request->tahun_akademik_id ?? null;
        $krsmahasiswa = Study_Value::leftJoin('lecture_schedulings', 'study_value.lecture_schedulings_id', '=', 'lecture_schedulings.id')
        ->select('study_value.*')
        ->where('lecture_schedulings.academic_year_id', $tahun_akademik )
        ->where('study_value.student_id', $mahasiswa[0]->id)                
                ->get();
     
        return view('mahasiswa.krs.indexmhs')->with([
            'academic_year' => $academic_year, 
            'krsmahasiswa' => $krsmahasiswa,
            'tahun_akademik' => $tahun_akademik,
            'mahasiswa' => $mahasiswa
            
            ]);
    }
    public function createmahasiswa(Request $request)
        {               
            $tahun_akademik = $request->segment(3);
            $academic_year = Academic_Year::get();
            $mahasiswa = LectureScheduling::where('academic_year_id', $tahun_akademik)->get();               
            return view('mahasiswa.krs.create')->with([
                'academic_year' => $academic_year, 
                'mahasiswa' => $mahasiswa,
                'tahun_akademik' => $tahun_akademik
            ]);
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
    public function createPDF(Request $request) {
     
        $tahun_akademik = Academic_Year::find( $request->segment(4));
        
        $angkatan = Generations::find( $request->segment(5));
        $mahasiswa = $request->segment(3);
      
        $krs = Study_Value::join('student', 'study_value.student_id', '=', 'student.id')
            ->where('study_value.lecture_schedulings_id', $tahun_akademik->id)
            ->where('student.generations_id', $angkatan->id)
            ->where('study_value.student_id', $mahasiswa)   
            ->get();
         
            

        view()->share('students',$krs);
        $pdf = PDF::loadView('mahasiswa.krs.pdf', [
            'krs' => $krs,
            'tahun_akademik' => $tahun_akademik,
            'mahasiswa' => $mahasiswa,
            'angkatan' => $angkatan
            ]);

        return $pdf->download('KRS.pdf');
      }

    public function storemahasiswa(Request $request)
    {
        $tahun_akademik = $request->tahun_akademik;
    
        $username = Auth::user()->username;
        $mahasiswa = Student::where('nim', $username)->first();
        $listjadwal = $request->pilih;

        $jadwal = Study_Value::where('student_id', $mahasiswa->id)->get();
        $totalskslama = 0;
        foreach ($jadwal as $i => $j) {
        $totalskslama += $j->lecture_schedulings->subject_course->sk ;
        }
        $totalSksBaru = 0;
        $daftarSks = $request->sks;
        foreach ($listjadwal as $i => $idjadwal) {
           $totalSksBaru += $daftarSks[$idjadwal];
        }
        $totalsemua = $totalskslama + $totalSksBaru;


        $sksmahasiswa = Sksmhs::where('student_id',  $mahasiswa->id)
                    ->where('academic_year_id', $tahun_akademik)
                ->first();

        // dd($totalsemua);
        if($sksmahasiswa->sks >= $totalsemua){
            foreach ($listjadwal as $i => $id_lecture_schedulings) { 
                $pilih = Study_Value::where('lecture_schedulings_id', $id_lecture_schedulings)
                ->where('student_id', $mahasiswa->id)
                ->first();
    
                if(!$pilih){
                   Study_Value::insert([
                        'student_id' => $mahasiswa->id,
                        'lecture_schedulings_id' =>$id_lecture_schedulings,
                        'created_by' => 1,
                        'updated_by' => 1
                    ]);
                }
            }
            
            return redirect('/krsmahasiswa')->with('status', 'Berhasil Menawar Mata Kuliah !!');
            
        }else{
            
            return redirect('/krsmahasiswa')->with('error', 'Jumlah SKS Tidak Mencukup !!!!');
        }
        


     
       
        
    }
 
    public function show()
    {
        //
    }
    public function edit($id)
    {
    }

    public function update(Request $request)
    {
    }
    public function destroymahasiswa($id)
    {
        Study_Value::where('id', $id)->delete();
        return redirect('/krsmahasiswa')->with('hapus', 'Berhasil Dihapus !!');;
}
    public function search(Request $request)
    {
    }
}
