<?php

namespace App\Http\Controllers;

use App\Models\User;
use Database\Seeders\Role;
use App\Exports\ExportUser;
use App\Imports\ImportUser;
use Illuminate\Http\Request;
use App\Models\Role as ModelsRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
  public function index(){
    $pengguna = User::paginate(10);    
    return view('admin.user.index', [ 'pengguna' => $pengguna]);
  }
  public function create()
    {
        $roles_id = ModelsRole::get();
        //memanggil view create
        return view('admin.user.create', [
            'roles_id' => $roles_id
        ]);
    }
  public function store(Request $request){
    User::insert([
      'name' => $request->name,
      'roles_id' => $request->roles_id,
      'created_by' => 1,
      'updated_by' => 1
  ]);
 
  return redirect('/user')->with('tambah','Berhasil menambah Data User SIMAK');
  }
  public function edit($id)
  {
      $roles_id = ModelsRole::get();
      $pengguna = User::where('id', $id)->get();
      return view('admin.user.edit', [
          'pengguna' => $pengguna,
          'roles_id' => $roles_id,
      ]);
  }

  public function update(Request $request)
  {
      User::where('id', $request->id)->update([
          'name' => $request->name,
          'username' =>$request->username,
          'password' =>$request->password,
          'email' =>$request->email,
          'roles_id' => $request->roles_id,
          'created_by' => 1,
          'updated_by' => 1
      ]);
     
      return redirect('/user')->with('edit','Berhasil mengedit data program studi');
  }

  public function search(Request $request)
  {
      // menangkap data pencarian
      $cari = $request->cari;
      // mengambil data dari table pegawai sesuai pencarian data
      $pengguna = User::where('name', 'like', "%" . $cari . "%")->orwhere('name', 'like', "%" . $cari . "%")->orwhere('email', 'like', "%" . $cari . "%")->paginate(10);
      // dd($students);

      // mengirim data pegawai ke view index
      return view('admin.user.index', ['pengguna' => $pengguna]);
  }
  public function destroy($id)
  {
      User::where('id', $id)->delete();
      return redirect('/user')->with('hapus','Berhasil menghapus data mahasiswa');;
  }
  public function export_excel()
  {
      return Excel::download(new ExportUser(), 'Data User.xlsx');
  }
  public function import_excel(Request $request){
      Excel::import(new ImportUser, $request->file('file')->store('files'));
      Session::flash('import','Berhasil mengimport data user');
      return redirect()->back();
  }
}
