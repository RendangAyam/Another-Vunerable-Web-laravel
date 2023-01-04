<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\OTPSend;
use App\Models\otp;
use Carbon\Carbon;
use DB;
use Auth;
use Session;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login', ['title' => 'Admin Login Page']);
    }

    public function doLogin( Request $request )
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);
        $credentials = $request->only(['email', 'password', 'active' => 1, 'role'=>'Admin']);
        // dd(Auth::attempt($credentials));   
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/listusers');
        }
        else{
            Session::flash('message', 'wrong username or password or account didn\'t active');
            return redirect('admin/login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->intended('home');
    }
}
