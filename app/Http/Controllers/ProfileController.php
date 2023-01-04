<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use DB;

class ProfileController extends Controller
{
    public function profile($id)
    {   
        $card = DB::select('select * from cards where id ='.$id);
        $user = DB::select('select * from users where cardnumber ='.$id);
        if($card == NULL){
            return view('home', ['title' => 'Home Page']);
        }
        // dd($card);
        return view('profile.profile', ['card'=>$card, 'user'=>$user]);
    }
}
