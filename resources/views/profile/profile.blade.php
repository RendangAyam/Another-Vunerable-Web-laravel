@extends('layouts.master')

@section('content')

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
    <div class="">
        <div class="bg-white py-5 px-5 mb-4">
            <div class="card bg-gray-800 rounded-[15px]">
                <div class="face front">
                    <h3 class="debit">Debit Card</h3>
                    <h3 class="bank">AVW</h3>
                    <img class="chip" src="{{ URL::asset('img/chip.png'); }}" alt="chip">
                    <h3 class="number"> {{$user[0]->cardnumber}} </h3>
                    <h5 class="valid"><span>Valid <br /> Date</span><span> {{date_format(new DateTime($user[0]->created_at), "m")}}/{{(int)(date_format(new DateTime($user[0]->created_at), "y")+5)}}</span></h5>
                    <h5 class="card-holder"> {{$user[0]->name}}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="flex ml-16 mb-8">
        <div class="">
            <a class="border-transparent text-gray-800 inline-flex items-center px-1 pt-1 border-b-2 text-2xl font-medium"> Name <a><br>
            <a class="border-transparent text-gray-500 inline-flex items-center px-1 pt-1 border-b-2 text-lg font-medium"><?php echo ($user[0]->name) ?><a><br>
            <a class="border-transparent text-gray-800 inline-flex items-center px-1 pt-1 border-b-2 text-2xl font-medium"> Email<a><br>
            <a class="border-transparent text-gray-500 inline-flex items-center px-1 pt-1 border-b-2 text-lg font-medium"> {{$user[0]->email}}<a><br>
            <a class="border-transparent text-gray-800 inline-flex items-center px-1 pt-1 border-b-2 text-2xl font-medium"> Balance <a><br>
            <a class="border-transparent text-gray-500 inline-flex items-center px-1 pt-1 border-b-2 text-lg font-medium"> Rp.  
                {{number_format($card[0]->money,2,",",".")}}
            <a><br>
        </div>
    </div>
</div>

@endsection