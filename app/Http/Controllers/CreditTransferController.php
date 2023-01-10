<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\debittransaction;
use DB;
use Session;

class CreditTransferController extends Controller
{
    public function index()
    {
        return view('credittransfer.credittransfer');
    }

    public function searchindex()
    {
        return view('credittransfer.searchcard');
    }

    public function searchcard(Request $request)
    {
        $card = DB::select('select * from users where cardnumber ='.$request->cardnumber);
        $val = DB::select('select * from registeredaccount where srccard = '.Auth::User()->cardnumber.'&& destcard ='.$request->cardnumber);
        if($card == NULL){
            Session::flash('message', 'Card Number Doesn\'t Exist');
            return redirect('credittransfer');
        }
        if($request->cardnumber == Auth::User()->cardnumber){
            Session::flash('message', 'Card Number can\'t be your Card Number');
            return redirect('credittransfer');
        }
        // dd($val);
        if($val){
            Session::flash('message', 'Card Number Already registered');
            return redirect('credittransfer');
        }
        
        // dd($card);
        return view('credittransfer.registercard', ['card'=>$card]);
    }

    public function registercard(Request $request)
    {
        DB::statement('INSERT INTO registeredaccount (destcard, srccard) VALUES ('.$request->destcard.','.$request->srccard.')');
        // dd($card);
        Session::flash('message', 'Card Number Succesfuly registered');
        return redirect('credittransfer');
    }
    public function listcard()
    {
        $list = DB::select('SELECT registeredaccount.destcard, name FROM registeredaccount JOIN users ON registeredaccount.destcard LIKE users.cardnumber WHERE registeredaccount.srccard ='.Auth::User()->cardnumber);
        // dd($list);
        return view('credittransfer.listcard', ['list'=>$list]);
    }
    public function transfer($cardnumber)
    {
        if($cardnumber == Auth::User()->cardnumber){
            Session::flash('message', 'Card Number can\'t be your Card Number');
            return redirect('credittransfer');
        }
        $list = DB::select('SELECT registeredaccount.destcard, name FROM registeredaccount JOIN users ON registeredaccount.destcard LIKE users.cardnumber WHERE registeredaccount.srccard ='.Auth::User()->cardnumber.'&& registeredaccount.destcard='.$cardnumber);
        // dd($list);
        if(!$list){
            Session::flash('message', 'Card Number Doesn\'t Exixt');
            return redirect('credittransfer');
        }
        return view('credittransfer.transfer', ['list'=>$list]);
    }
    public function transferaction(Request $request)
    {
        // dd($request);
        $srccard = base64_decode(str_rot13(hex2bin($request->srccard)));
        $user = DB::select('SELECT * from users where cardnumber = '.Auth::User()->cardnumber);
        if(!$user || !Hash::check($request->password, $user[0]->password)){
            Session::flash('message', 'Wrong Password');
            return redirect('credittransfer/transfer/'.$request->destcard);
        }
        $src = DB::select('SELECT * from cards where id ='.$srccard);
        $dest = DB::select('SELECT * from cards where id ='.$request->destcard);
        if($src[0]->money >= $request->nominal){
            //set src money--
            DB::statement('UPDATE cards SET money = '.$src[0]->money-$request->nominal.' WHERE id='.$srccard);
            //set dest money++
            DB::statement('UPDATE cards SET money = '.$src[0]->money+$request->nominal.' WHERE id='.$request->destcard);
            //insert transactin into debittransaction
            $transaction = debittransaction::create([
                'srccard' => $srccard,
                'destcard' => $request->destcard,
                'nominal' => $request->nominal,
            ]);
            Session::flash('message', 'Successfuly Transfer Credit');
            return redirect('credittransfer');
        }
        Session::flash('message', 'Not enough money to make transaction');
        return redirect('credittransfer/transfer/'.$request->destcard);
    }
}