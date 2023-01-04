@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-white ">
    <header class="pb-24 bg-gradient-to-r from-light-blue-800 to-cyan-600">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <form action="{{ route('forgotpasswordaction') }}" method="POST">
                @csrf
                <div class="mb-4 form-group">
                    <label class="block text-grey-darker text-sm font-medium mb-2" for="email">
                        Email
                    </label>
                    <input class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="email" type="email" name="email" placeholder="Email">
                    <div class="mt-2 self-center text-lg text-red-500">
                    </div>
                </div>
                @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif
                <div class="flex items-center justify-between">
                    <button class="bg-gray-900 hover:bg-gray-400 hover:text-black text-white font-medium py-2 px-4 rounded" type="submit">
                        Send OTP
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>

@endsection