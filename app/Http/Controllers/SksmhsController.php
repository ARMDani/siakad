<?php

namespace App\Http\Controllers;

use App\Models\Academic_Year;
use App\Models\Generations;
use Illuminate\Http\Request;
use App\Models\Sksmhs;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SksmhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $generations = Generations::get();
        $academikyear = Academic_Year::get();

        $mahasiswa = [];
        $params = ['angkatan' => null, 'tahun_akademik' =>  null];

        if ($request->isMethod('post')) {
            $mahasiswa = DB::table('student')
                ->select('student.*', 'sksmhs.sks', 'sksmhs.id as id_sksmhs')
                ->leftJoin('sksmhs', function ($join) use ($request) {
                    $join->on('sksmhs.student_id', '=', 'student.id')
                        ->where('sksmhs.academic_year_id', $request->tahun_akademik_id);
                })
                ->where('student.generations_id', $request->angkatan)
                ->get();

            $angkatan = Generations::find($request->angkatan);
            $tahun_akademik = Academic_Year::find($request->tahun_akademik_id);

            $params = ['angkatan' => $angkatan, 'tahun_akademik' => $tahun_akademik];
            // dd($mahasiswa);
        }
        return view('prodi.pengaturansks.index', [
            'mahasiswa' => $mahasiswa,
            'generation' => $generations,
            'academikyear'  => $academikyear,
            'params' => $params
        ]);
    }

    public function create()
    {
        //
    }

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
                $sksmhs = Sksmhs::insert([
                    'student_id' => $student_id,
                    'academic_year_id' => $tahun_akademik_id,
                    'sks' => $jumlah_sks,
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id
                ]);
            } else {
                $sksmhs = Sksmhs::where('id', $id_sksmhs)->update([
                    'sks' => $jumlah_sks,
                    'updated_by' => Auth::user()->id
                ]);
            }
        }
        return redirect('/sksmhs');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
