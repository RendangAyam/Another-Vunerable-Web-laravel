@extends('layouts.adminlogin')

@section('content')

<div class="min-h-screen bg-white ">
    <header class="pb-24 bg-gradient-to-r from-light-blue-800 to-cyan-600">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="rounded px-8 pt-6 pb-8 mb-4">
                <form action="{{ route('admin/login.auth') }}" method="POST">
                    @csrf
                    <div class="mb-4 form-group">
                        <label class="block text-grey-darker text-sm font-medium mb-2" for="email">
                            Email
                        </label>
                        <input class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="email" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="mb-6">
                        <label class="block text-grey-darker text-sm font-medium mb-2" for="password">
                            Password
                        </label>
                        <input class="form-control shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="password" name="password" placeholder="******************">
                        @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                        @endif
                    </div>
                    <div class="flex items-center justify-between">
                        <button class="bg-gray-900 hover:bg-gray-400 hover:text-black text-white font-medium py-2 px-4 rounded" type="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

@endsection