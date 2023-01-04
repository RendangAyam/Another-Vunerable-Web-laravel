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

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', ['title' => 'Admin Dashboard']);
    }
}
