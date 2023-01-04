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

class ListUserController extends Controller
{
    public function index()
    {
        $list = DB::select('SELECT `name`, `email`, cardnumber FROM users WHERE ROLE NOT LIKE \'Admin\'');
        return view('admin.listuser', ['list'=>$list]);
    }
}
