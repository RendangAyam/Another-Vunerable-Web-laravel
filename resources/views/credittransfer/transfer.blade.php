@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-white ">
    <div class="relative max-w-xl mx-auto flex-col">
        <h1 class="my-2 w-full inline-flex py-3 text-2xl font-medium text-gray-900">
            Transfer Credit
        </h1>
        <div class="">
            <form action="{{ route('credittransfer/transfer/action') }}" method="POST" class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <div class="mt-1">
                        {{$list[0]->name}}
                    </div>
                </div>
                <div>
                    <label for="destcard" class="block text-sm font-medium text-gray-700">Card Number</label>
                    <div class="mt-1">
                        {{$list[0]->destcard}}
                        <input type="hidden" name="destcard" id="destcard" value="{{$list[0]->destcard}}">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="nominal" class="block text-sm font-medium text-gray-700">Nominal</label>
                    <div class="mt-1">
                        <input required="required" type="text" pattern="[0-9]+" name="nominal" id="nominal" class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1">
                        <input required="required" type="password" name="password" id="password" class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                    </div>
                </div>
                <div>
                    @if(session('message'))
                    <div class="alert alert-success danger">
                        {{session('message')}}
                    </div>
                    @endif
                </div>
                <div class="sm:col-span-2">
                    <input type="hidden" name="srccard" value="{{ bin2hex(str_rot13(base64_encode(Auth::User()->cardnumber))) }}">
                    <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Transfer
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</div>

@endsection