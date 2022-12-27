<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;

class ClassController extends Controller
{
    public function index()
    {
        $class = ClassModel::paginate(10);
        return view('admin.class.index', ['class' => $class]);
    }
    public function create()
    {
        return view('admin.class.create');
    }
    public function store(Request $request)
    {
        ClassModel::insert([
            'name' => $request->name,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        return redirect('/kelas');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $class = ClassModel::where('id', $id)->get();
        return view('admin.class.edit', ['class' => $class]);
    }
    public function update(Request $request)
    {
        ClassModel::where('id', $request->id)->update([
            'name' => $request->name,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        return redirect('/kelas');
    }
    public function destroy($id)
    {
        ClassModel::where('id', $id)->delete();
        return redirect('/kelas');
    }
    public function search(Request $request)
    {
        $cari = $request->cari;
        $class = ClassModel::where('id', 'like', "%" . $cari . "%")->orwhere('name', 'like', "%" . $cari . "%")->paginate(10);
        return view('admin.class.index', ['class' =>  $class]);
    }
}
