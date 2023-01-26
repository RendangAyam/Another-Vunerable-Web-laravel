<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\OTPSend;
use Carbon\Carbon;
use App\Models\User;
use App\Models\loan;
use DB;
use Auth;
use Session;


class LoanController extends Controller
{
    public function index()
    {
        // dd(Auth::User()->ktp);
        if(Auth::User()->ktp){
            if(Auth::User()->ktp == 'reject'){
                // dd(Auth::User());
                return view('loan.uploadktp', ['title' => 'Loan']);
            }
            return view('loan.loan', ['title' => 'Loan']);
        }
        return view('loan.uploadktp', ['title' => 'Loan']);
    }

    public function storektp( Request $request )
    {
        // dd($request);
        // $ext = $request->file('image')->getClientOriginalExtension();
        // // dd($ext);
        // if($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
        //     Session::flash('message', 'Invalid File Extension');
        //     return redirect('loan');
        // }
        if($request->file('image')){
            $file= $request->file('image');
            // dd($file);
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('storage/image'), $filename);
            $image_path = 'image/'.$filename;
        }
        // $image_path = $request->file('image')->store('image', 'public');
        // dd($request->file('image')->getClientOriginalExtension());
        $user = User::where('email', Auth::User()->email)
        ->update([
            'ktp'=> $image_path,
        ]);
        // dd($user);
        Session::flash('message', 'KTP successfuly upload');
        return redirect('loan');
    }

    public function termandcondition()
    {
        return view('loan.termandcondition', ['title' => 'Loan']);
    }

    public function createloannominal( Request $request )
    {
        if($request->term == 1){
            return view('loan.createloannominal', ['title' => 'Loan']);
        }
        else{
            Session::flash('message', 'Must Agree with Terms and Conditions');
            return back();
        }
    }
    
    public function createloannominalindex()
    {

        return view('loan.createloannominal', ['title' => 'Loan']);

    }

    public function createloaninstallment( Request $request )
    {
        if($request->nominal>5000000){
            Session::flash('message', 'nominal must be under 5.000.000');
            return redirect('loan/create/nominal');
        }
        elseif($request->nominal<600000){
            Session::flash('message', 'nominal must be over 600.000');
            return redirect('loan/create/nominal');
        }
        $instalment = $request->nominal/200000;
        // dd($instalment);
        return view('loan.createloaninstallment', ['title' => 'Loan', 'nominal' => $request->nominal, 'installment' => $instalment ]);
    }

    public function createloancalcuate( Request $request )
    {
        if(!$request->installment){
            Session::flash('message', 'instalment must be checked');
            return redirect('loan/create/nominal');
        }
        $total = $request->nominal+($request->nominal*2/100);
        $monthly = number_format((float)$total/$request->installment, 2, '.', '');
        
        // echo $total;
        // echo $monthly;
        // dd($request);
        return view('loan.createloancalculate', ['title' => 'Loan', 'nominal' => $request->nominal, 'installment' => $request->installment , 'total' => $total, 'monthly' => $monthly]);
    }

    public function createloan( Request $request )
    {
        if (isset($request->status)){
            $loan = loan::create([
                'cardnumber' => Auth::User()->cardnumber,
                'nominal' => $request->nominal,
                'totalpayment' => $request->total,
                'monthlypayment' => $request->monthly,
                'installment' => $request->installment,
                'status' => $request->status,
            ]);

        }
        else{
            $loan = loan::create([
                'cardnumber' => Auth::User()->cardnumber,
                'nominal' => $request->nominal,
                'totalpayment' => $request->total,
                'monthlypayment' => $request->monthly,
                'installment' => $request->installment,
                'status' => 'Waiting Aproval',
            ]);
        }
        $total = $request->nominal+($request->nominal*2/100);
        $monthly = $total/$request->installment;
        // echo $total;
        // echo $monthly;
        // dd($request);
        Session::flash('message', 'Successfuly Requested');
        return redirect('loan');
    }

    public function listloan( $cardnumber )
    {
        // $list = loan::select('id','nominal','totalpayment','monthlypayment','installment','status','created_at')->where('cardnumber', $cardnumber)->orderBy('created_at', 'desc')->get();
        $list = DB::select('SELECT `id`,nominal,totalpayment,monthlypayment,installment,`status`,created_at FROM loans WHERE cardnumber = '.$cardnumber.' ORDER BY created_at DESC');
        // dd($list);
        return view('loan.listloan', ['list'=>$list]);
    }

}
