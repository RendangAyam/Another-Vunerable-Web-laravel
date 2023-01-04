@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-white ">
    <div class="relative max-w-xl mx-auto flex-col">
        <h1 class="my-2 w-full inline-flex py-3 text-2xl font-medium text-gray-900">
            Register Card number
        </h1>
        <form action="{{ route('credittransfer/action/search') }}" method="POST">
            @csrf
            <label for="card_number" class="block text-sm font-medium text-gray-700">Account number</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input required="required" type="text" pattern="[0-9]+" name="cardnumber" id="card_number" class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" placeholder="1234123412341234">
                <input type="hidden" name="user_id" value="{{ Auth::User()->cardnumber }}">
            </div>
            @if(session('message'))
            <div class="alert alert-warning">
                {{session('message')}}
            </div>
            @endif
            <button type="submit" name="search" class="my-2 inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Search
            </button>
        </form>
    </div>
</div>

@endsection