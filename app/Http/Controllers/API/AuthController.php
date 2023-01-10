<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

            $user = User::leftJoin('student', 'users.username', '=', 'student.nim') 
                    ->where('users.username', $request->username)
                    ->get();
                // $user = User::where('username', $request->username)->firstOrFail();
                // $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json([
                'message' => 'Login success',
                // 'access_token' => $token,
                'data' => $user
                ]);
    }
}

    


