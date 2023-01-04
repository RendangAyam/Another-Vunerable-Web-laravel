<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Card;
use App\Mail\MailSend;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Session;
use DB;

class SignUpController extends Controller
{
    public function signup()
    {
        return view('signup', ['title' => 'signup']);
    }
    
    public function actionsignup(Request $request)
    {   
        $name = htmlspecialchars($request->name);
        // echo ($name);
        // dd($request);
        $email = DB::select('SELECT email FROM users WHERE email = \''.$request->email.'\'');
        if($email){
            Session::flash('message', 'Email already registered');
            return back();
        }
        $nik = DB::select('SELECT nik FROM users WHERE nik = \''.$request->nik.'\'');
        if($nik){
            Session::flash('message', 'NIK already registered');
            return back();
        }

        $str = strtoupper(Str::random(6));
        // $name = strip_tags($request->name);
        $user = User::create([
            'nik' => $request->nik,
            'email' => $request->email,
            'name' => $name,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'verify_key' => $str,
        ]);

        $card = Card::create();

        $details = [
            'name' => $request->name,
            'role' => $request->role,
            'datetime' => date('Y-m-d H:i:s'),
            'url' => request()->getHttpHost().'/signup/verify/'.$str
        ];

        Mail::to($request->email)->send(new MailSend($details));
        // echo $str;
        Session::flash('message', 'Link already sended to your email. Please check your email to activate your account');
        return redirect('signup');
    }
    public function verify($verify_key)
    {
        $keyCheck = User::select('verify_key')
                    ->where('verify_key', $verify_key)
                    ->exists();
        
        if ($keyCheck) {
            $user = User::where('verify_key', $verify_key)
            ->update([
                'active'=> 1,
                'email_verified_at' => date('Y-m-d H:i:s'),
            ]);
            
            return "Verifikasi Berhasil. Akun Anda sudah aktif.";
        }else{
            return "Key tidak valid!";
        }
    }
}
