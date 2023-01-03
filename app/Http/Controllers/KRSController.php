<?php

namespace App\Http\Controllers;

use App\Models\Study_Value;
use Illuminate\Http\Request;

class KRSController extends Controller
{
    public function index()
    {
        // $krs = Study_Value::paginate(10);
        return view('prodi.krs.index');
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
