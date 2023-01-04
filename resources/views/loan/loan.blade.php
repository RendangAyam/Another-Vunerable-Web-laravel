@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-white ">
    <div class="relative max-w-xl mx-auto">
        <a href="{{ route('loan/termandcondition') }}" class="mt-16 my-2 w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Create New Loan
        </a>
        <a href="{{ route('loan/list', Auth::User()->cardnumber) }}" class="my-2 w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            List Loan
        </a>
        <div>
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
        </div>
    </div>
</div>

@endsection