<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AccountActivityController extends Controller
{
    public function index( $cardnumber )
    {
        $list = DB::select('SELECT name, srccard, destcard, nominal, debittransactions.created_at FROM debittransactions JOIN users ON (debittransactions.destcard LIKE users.cardnumber AND users.cardnumber != '.$cardnumber.') OR (debittransactions.srccard LIKE users.cardnumber AND users.cardnumber != '.$cardnumber.') WHERE srccard = '.$cardnumber.' OR `destcard` = '.$cardnumber.' ORDER BY created_at DESC');
        // $list = DB::select('SELECT name, srccard, destcard, nominal, debittransactions.created_at FROM debittransactions JOIN users ON (debittransactions.destcard LIKE users.cardnumber AND users.cardnumber != '.Auth::User()->cardnumber.') OR (debittransactions.srccard LIKE users.cardnumber AND users.cardnumber != '.Auth::User()->cardnumber.') WHERE srccard = '.Auth::User()->cardnumber.' OR `destcard` = '.Auth::User()->cardnumber);
        // dd($list);
        return view('accountactivity.accountactivity', ['list'=>$list]);
    }
}
