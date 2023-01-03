<?php

namespace App\Http\Controllers;

use App\Models\Academic_Year;
use App\Models\Study_Value;
use Illuminate\Http\Request;

class KRSController extends Controller
{
    public function index(Request $request)
    {
        $academic_year = Academic_Year::get();

        $tahun_akademik = $request->tahun_akademik_id ?? null;
        $students = Study_Value::where('study_value.student_id', $tahun_akademik)
            ->get();


        return view('prodi.krs.index')->with([
            'academic_year' => $academic_year,
            'student' => $students,
            'tahun_akademik' => $tahun_akademik

        ]);;
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
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
    public function destroy($id)
    {
    }
    public function search(Request $request)
    {
    }
}
