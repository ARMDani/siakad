<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    public function login (Request $request)
    {


        if (!Auth::attempt($request->only('username', 'password'))) {
            return response()->json([
                'message'=> 'Unauthorized'
                ], 401);
            }
            $username = Auth::user()->username;
            $mahasiswa = Student::where('nim', $username)->get();
            $user = User::leftJoin('student', 'users.username', '=', 'student.nim') 
                    ->where('users.username', $request->username)
                    ->get();
                $user = User::where('username', $request->username)->firstOrFail();
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json([
                'message' => 'Login success',
                'access_token' => $token,
                'data' => $user
                ]);
    }
}

    


