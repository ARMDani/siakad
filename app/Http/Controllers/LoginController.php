<?php


// -------------------------login controller--------

namespace App\Http\Controllers;


use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    // public function index()
    // {
    //     return view('auth.login', [
    //         'title' => 'Login',
    //     ]);
    // }


    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username ' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {
            if (auth()->user()->role->id == '1') {
                return redirect()->route('home');
            } else if (auth()->user()->role->id == '2') {
                // return redirect()->route('manager.home');
                echo "tes";
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login')->with('error', 'username And Password Are Wrong.');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }
}
