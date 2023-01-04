<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\OTPSend;
use App\Models\password_reset;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Auth;
use Session;

class ForgetPasswordController extends Controller
{
    public function index()
    {
        return view('forgotpassword.forgotpassword', ['title' => 'forgot password']);
    }

    public function sendotp( Request $request )
    {
        $str = strtoupper(Str::random(6));

        $user = DB::select('SELECT `name`, `role` FROM users WHERE email = \''.$request->email.'\'');

        $details = [
            'name' => $user[0]->name,
            'datetime' => date('Y-m-d H:i:s'),
            'url' => request()->getHttpHost().'/otpverify/'.$request->email.'/'.$str
        ];

        $password_reset = password_reset::create([
            'email'=>$request->email,
            'token'=>$str,
        ]);

        Mail::to($request->email)->send(new OTPSend($details));
        echo $str;

        Session::flash('message', 'Link already sended to your email. Please check your email to reset your password');
        return redirect('forgotpassword');
    }

    public function otpverify($email, $token)
    {
        $keyCheck = DB::select('SELECT email, `token`, created_at FROM password_resets WHERE email = \''.$email.'\' && token = \''.$token.'\'');
        $start = Carbon::now();
        $end = Carbon::parse($keyCheck[0]->created_at);
        // echo $end->diffInMinutes($start);;
        if ($keyCheck && $end->diffInMinutes($start)<3) {
            return view('forgotpassword.changepassword', ['title' => 'change password', 'email' => $email]);
        }else{
            return "<h1>Invalid link!";
        }
    }

    public function changepassword( Request $request )
    {
        if($request->repassword == $request->password){
            // dd($request);
            $user = User::where('email', $request->email)
            ->update([
                'password'=> Hash::make($request->password),
            ]);
            Session::flash('message', 'password succesfuly changed');
            return redirect('login');
        }
        Session::flash('message', 'password didn\'t match');
        return back();
    }
}
