<?php

namespace App\Http\Controllers;

use App\Models\Academic_Year;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{

    public function index()
    {
        $ta = Academic_Year::paginate(10);
        return view('admin.Academic_Year.index', ['ta' => $ta]);
    }


    public function create()
    {
        return view('admin.Academic_Year.create');
    }

    public function store(Request $request)
    {
        //
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
