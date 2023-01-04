<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use DB;
use Auth;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', ['title' => 'Login Page']);
    }

    public function doLogin( Request $request )
    {
        $user = DB::select('SELECT `active` FROM users WHERE email = \''.$request->email.'\'');
        if($user[0]->active == 0){
            Session::flash('message', 'wrong username or password or account didn\'t active');
            return back();
        }
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);
        $credentials = $request->only(['email', 'password', 'active' => 1, 'role'=>'User']);
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        Session::flash('message', 'wrong username or password or account didn\'t active');
        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->intended('home');
    }
}