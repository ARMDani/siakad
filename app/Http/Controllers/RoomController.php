<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Academic_Room;
use App\Http\Controllers\Controller;
use Session;
use App\Exports\RoomExport;
use App\Imports\ImportAcademic_Room;
use App\Imports\StudyFacultyImport;
use Maatwebsite\Excel\Facades\Excel;

class RoomController extends Controller
{
    public function index()
    {
        $roomss = Academic_Room::paginate(10);
        return view('admin.academic_room.index', ['room' => $roomss]);
    }

    public function create()
    {
        return view('admin.academic_room.create');
    }

    public function store(Request $request)
    {
        Academic_Room::insert([
            'name' => $request->name,
            'code_room' => $request->code_room,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Session::flash('tambah','Berhasil menambah data ruangan');
        return redirect('/ruangan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $rooms = Academic_Room::where('id', $id)->get();
        return view('admin.academic_room.edit', ['room' => $rooms]);
    }

    public function update(Request $request)
    {
        Academic_Room::where('id', $request->id)->update([
            'name' => $request->name,
            'code_room' => $request->code_room,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Session::flash('edit','Berhasil mengedit data fakultas');
        return redirect('/ruangan');
    }

    public function destroy($id)
    {
        Academic_Room::where('id', $id)->delete();
        Session::flash('hapus','Berhasil menghapus data fakultas');
        return redirect('/ruangan');
    }

    public function search(Request $request)
    {
        $cari = $request->cari;
        $rooms = Academic_Room::where('code_room', 'like', "%" . $cari . "%")->orwhere('name', 'like', "%" . $cari . "%")->paginate(10);
        return view('admin.academic_room.index', ['rooms' =>  $rooms]);
    }
    public function export_excel()
    {
        return Excel::download(new RoomExport(), 'Data Ruangan.xlsx');
    }
    public function import_excel(Request $request)
    {
        Excel::import(new ImportAcademic_Room, $request->file('file')->store('files'));
        Session::flash('import','Berhasil mengimport data ruangan');
        return redirect()->back();
    }
}
