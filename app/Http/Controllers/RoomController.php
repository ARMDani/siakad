<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Academic_Room;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Academic_Room::paginate(10);
        return view('admin.room.index', ['rooms' => $rooms]);
    }

    public function create()
    {
        return view('admin.room.create');
    }

    public function store(Request $request)
    {
        Academic_Room::insert([
            'name' => $request->name,
            'code_room' => $request->code_room,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        return redirect('/ruangan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $rooms = Academic_Room::where('id', $id)->get();
        return view('admin.room.edit', ['rooms' => $rooms]);
    }

    public function update(Request $request)
    {
        Academic_Room::where('id', $request->id)->update([
            'name' => $request->name,
            'code_room' => $request->code_room,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        return redirect('/ruangan');
    }

    public function destroy($id)
    {
        Academic_Room::where('id', $id)->delete();
        return redirect('/ruangan');
    }

    public function search(Request $request)
    {
        $cari = $request->cari;
        $rooms = Academic_Room::where('code_room', 'like', "%" . $cari . "%")->orwhere('name', 'like', "%" . $cari . "%")->paginate(10);
        return view('admin.room.index', ['rooms' =>  $rooms]);
    }
}
