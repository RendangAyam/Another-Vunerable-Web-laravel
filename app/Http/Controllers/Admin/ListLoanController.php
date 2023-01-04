<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\loan;
use App\Models\User;
use App\Models\Card;
use DB;
use Auth;
use Session;

class ListLoanController extends Controller
{
    public function index()
    {
        $list = DB::select('SELECT `name`, users.cardnumber, totalpayment, monthlypayment, installment, ktp, loans.created_at, loans.id, loans.nominal, loans.status FROM loans JOIN users ON (loans.cardnumber LIKE users.cardnumber)');
        // dd($list);
        return view('admin.listloanreq', ['list'=>$list]);
    }

    public function reject(Request $request)
    {
        $loanCheck = loan::select('id')
                    ->where('id', $request->id)
                    ->exists();
        
        if ($loanCheck) {
            $loan = loan::where('id', $request->id)
            ->update([
                'status'=> 'Rejected',
            ]);
            
            Session::flash('message', 'Successfuly edited');
            return redirect('admin/listloan');
        }else{
            Session::flash('message', 'failed to edit');
            return redirect('admin/listloan');
        }
    }

    public function rejectktp(Request $request)
    {
        $userCheck = User::select('cardnumber')
                    ->where('cardnumber', $request->cardnumber)
                    ->exists();
        
        if ($userCheck) {
            $user = User::where('cardnumber', $request->cardnumber)
            ->update([
                'ktp'=> 'reject',
            ]);
            
            Session::flash('message', 'Successfuly edited');
            return redirect('admin/listloan');
        }else{
            Session::flash('message', 'failed to edit');
            return redirect('admin/listloan');
        }
    }

    public function approve(Request $request)
    {
        $loanCheck = loan::select('id')
                    ->where('id', $request->id)
                    ->exists();
        
        if ($loanCheck) {
            $loan = loan::where('id', $request->id)
            ->update([
                'status'=> 'Approved',
            ]);

            $money = DB::select('SELECT money FROM cards WHERE id = '.$request->cardnumber);
                    
            $mny=$money[0]->money+(int)$request->nominal;
            // dd($money);
            $user = Card::where('id', $request->cardnumber)
            ->update([
                'money'=> $mny,
            ]);
            
            Session::flash('message', 'Successfuly edited');
            return redirect('admin/listloan');
        }else{
            Session::flash('message', 'failed to edit');
            return redirect('admin/listloan');
        }
    }

}
