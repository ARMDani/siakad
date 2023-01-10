<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Study_Value;
use App\Models\Generations;
use Illuminate\Http\Request;
use App\Models\Academic_Year;
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
        $mahasiswa = LectureScheduling::join('subject_course', 'lecture_schedulings.subject_course_id', '=', 'subject_course.id')
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
        $jadwal = LectureScheduling::get();
        $jadwalk = $request->jadwalk_id ?? null;
        $mahasiswas = Study_Value::where('study_value.student_id', $jadwalk)                
                ->get();
                dd($mahasiswas);

        return view('prodi.input_nilai.input_nilai')->with([ 
            'jadwal' => $jadwal,
            'mahasiswas' => $mahasiswas,          
              ]);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();

        foreach($data['idMhs'] as $index=>$item){
            $Na = ($data['nilai_absen'][$index]*0.15)+($data['nilai_tugas'][$index]*0.15)+($data['nilai_uts'][$index]*0.3)+($data['nilai_uas'][$index]*0.4);
            if($Na >= 80){
                $huruf = "A";
            }elseif($Na >= 60 && $Na < 80){
                $huruf = "B";
            }elseif($Na >= 40 && $Na < 60){
                $huruf = "C";
            }elseif($Na >= 1 && $Na < 40){
                $huruf = "D";
            }else{
                $huruf = "E";
            }
            Study_Value::where('id_mahasiswa', $data['idMhs'][$index])
            ->where('id_schedule', $id)
            ->update([
                'nilai_absen' => $data['nilai_absen'][$index],
                'nilai_tugas' => $data['nilai_tugas'][$index],
                'nilai_uts' => $data['nilai_uts'][$index],
                'nilai_uas' => $data['nilai_uas'][$index],
                'nilai_akhir' => $Na,
                'nilai_huruf' => $huruf,
            ]);
        }

        return redirect()->route('nilai.show', $id)->with('status', 'Nilai berhasil diisi');
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
        // dd($request);
        $data_sks = $request->sks;
        // dd($data_sks);
        $tahun_akademik_id = $request->tahun_akademik;

        foreach ($data_sks as $student_id => $data_sksmhs) {

            $jumlah_sks = $data_sksmhs['jumlah_sks'];
            $id_sksmhs = $data_sksmhs['id_sksmhs'];

            if ($id_sksmhs == null) {
                $sksmhs = Study_Value::insert([
                    'student_id' => $student_id,
                    'academic_year_id' => $tahun_akademik_id,
                    'sks' => $jumlah_sks,
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id
                ]);
            } else {
                $sksmhs = Study_Value::where('id', $id_sksmhs)->update([
                    'sks' => $jumlah_sks,
                    'updated_by' => Auth::user()->id
                ]);
            }
        }
        return redirect('/sksmhs');
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
