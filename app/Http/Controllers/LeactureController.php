<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;

class LeactureController extends Controller
{
    public function index()
    {
        $leacture = Lecturer::paginate(10);
        return view('admin.leacture.index', ['leacture' => $leacture]);
    }


    public function create()
    {
        return view('admin.leacture.create');
    }


    public function store(Request $request)
    {
        Lecturer::insert([
            'name' => $request->name,
            'nidn' => $request->nidn,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'address' => $request->address,
            'photo' => $request->photo,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        return redirect('/leacture');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $leacture = Lecturer::where('id', $id)->get();
        return view('admin.leacture.edit', [
            'leacture' => $leacture,
        ]);
    }

    public function update(Request $request)
    {
        Lecturer::where('id', $request->id)->update([
            'name' => $request->name,
            'nidn' => $request->nidn,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'address' => $request->address,
            'photo' => $request->photo,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        return redirect('/leacture');
    }

    public function destroy($id)
    {
        Lecturer::where('id', $id)->delete();
        return redirect('/leacture');
    }
}
