@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-white ">
    <div class="relative max-w-xl mx-auto flex-col">
        <h1 class="my-2 w-full inline-flex py-3 text-2xl font-medium text-gray-900">
            Register Card number
        </h1>
        <form class="" action="{{ route('credittransfer/action/register') }}" method="POST">
            {{ $card[0]->name }}<br/>
            @csrf
            <input type="hidden" name="destcard" id="destcard" value="{{ $card[0]->cardnumber }}">
            <input type="hidden" name="srccard" id="srccard" value="{{ Auth::User()->cardnumber }}">
            <button type="submit" name="register" class="flex justify-center my-2 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Register
            </button>
        </form>
    </div>
</div>

@endsection