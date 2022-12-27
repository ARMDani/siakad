<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject_Course;
use App\Models\Lecturer;

class SubjekcourseController extends Controller
{
    public function index()
    {
        $course = Subject_Course::paginate(10);
        return view('admin.subject_course.index', ['course' => $course]);
    }
    public function create()
    {
        $leacture = Lecturer::get();
        //memanggil view create
        return view('admin.subject_course.create', [
            'leacture' => $leacture,
        ]);
    }
    public function store(Request $request)
    {
        Subject_Course::insert([
            'course_code' => $request->course_code,
            'name' => $request->name,
            'sk' => $request->sk,
            'semester' => $request->semester,
            'lecturer_id' => $request->lecturer_id,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        return redirect('/matakuliah');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $courses = Subject_Course::where('id', $id)->get();
        $leacture = Lecturer::get();

        return view('admin.subject_course.edit', [
            'course' => $courses,
            'leacture' => $leacture,

        ]);
    }
    public function update(Request $request)
    {
        Subject_Course::where('id', $request->id)->update([
            'course_code' => $request->course_code,
            'name' => $request->name,
            'sk' => $request->sk,
            'semester' => $request->semester,
            'lecturer_id' => $request->lecturer_id,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        return redirect('/matakuliah');
    }
    public function destroy($id)
    {
        Subject_Course::where('id', $id)->delete();
        return redirect('/matakuliah');
    }
    public function search(Request $request)
    {
        $cari = $request->cari;
        $course = Subject_Course::where('course_code', 'like', "%" . $cari . "%")->orwhere('name', 'like', "%" . $cari . "%")->paginate(10);
        return view('admin.subject_course.index', ['course' =>  $course]);
    }
}
