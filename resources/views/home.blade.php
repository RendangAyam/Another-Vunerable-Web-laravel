@extends('layouts.master')

@section('content')
<div class="py-6">
  <div class="relative">
    <div class="max-w-6xl min-h-4xl mx-auto sm:px-6 lg:px-8">
      <div class="relative shadow-xl sm:rounded-2xl sm:overflow-hidden">
        <div class="absolute inset-0">
          <img class="h-full w-full object-cover" src="{{ asset('img/card.jpg') }}" alt="People working on laptops">
          <div class="absolute inset-0 bg-gray-600" style="mix-blend-mode: multiply;"></div>
        </div>
        <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8">
          <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
            <span class="block text-white">Another Vunerable Web</span>
            {{-- <span class="block text-indigo-200">customer support</span> --}}
          </h1>
          <p class="mt-6 max-w-lg mx-auto text-center text-xl text-indigo-200 sm:max-w-3xl">
            Welcome to Another Vunerable Web Online Banking. Another Vunerable Web provides a greener and more convenient way to manage your money. It enables you to check your account balances, loans, transfer money, and keep detailed records of your transactions, wherever there is an internet connection.
          </p>
          {{-- <div class="mt-10 max-w-sm mx-auto sm:max-w-none sm:flex sm:justify-center">
            <div class="space-y-4 sm:space-y-0 sm:mx-auto sm:inline-grid sm:grid-cols-2 sm:gap-5">
              <a href="#" class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-indigo-700 bg-white hover:bg-indigo-50 sm:px-8">
                Get started
              </a>
              <a href="#" class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-500 bg-opacity-60 hover:bg-opacity-70 sm:px-8">
                Live demo
              </a>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection