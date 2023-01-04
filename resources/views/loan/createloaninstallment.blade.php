@extends('layouts.master')

@section('content')

<div class="bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        Create Loan
        </h2>
    </div>

    <div class="my-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" action="{{ route('loan/create/calcuate') }}" method="POST">
                @csrf
                @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif
                <div>
                    <label for="installment" class="block text-sm font-medium text-gray-700">
                        Installment
                    </label>
                    <div class="grid grid-cols-4">
                        @if($installment>=3)
                        <div class="flex items-center mb-4 mt-4">
                            <input id="installment-1" type="radio" value="3" name="installment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="installment-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">3</label>
                        </div>
                        @endif
                        @if($installment>=6)
                        <div class="flex items-center mb-4 mt-4">
                            <input id="installment-2" type="radio" value="6" name="installment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="installment-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">6</label>
                        </div>
                        @endif
                        @if($installment>=9)
                        <div class="flex items-center mb-4 mt-4">
                            <input id="installment-3" type="radio" value="9" name="installment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="installment-3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">9</label>
                        </div>
                        @endif
                        @if($installment>=12)
                        <div class="flex items-center mb-4 mt-4">
                            <input id="installment-4" type="radio" value="12" name="installment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="installment-4" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">12</label>
                        </div>
                        @endif
                        @if($installment>=15)
                        <div class="flex items-center mb-4 mt-4">
                            <input id="installment-5" type="radio" value="15" name="installment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="installment-5" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">15</label>
                        </div>
                        @endif
                        @if($installment>=18)
                        <div class="flex items-center mb-4 mt-4">
                            <input id="installment-6" type="radio" value="18" name="installment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="installment-6" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">18</label>
                        </div>
                        @endif
                        @if($installment>=21)
                        <div class="flex items-center mb-4 mt-4">
                            <input id="installment-7" type="radio" value="21" name="installment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="installment-7" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">21</label>
                        </div>
                        @endif
                        @if($installment>=24)
                        <div class="flex items-center mb-4 mt-4">
                            <input id="installment-8" type="radio" value="24" name="installment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="installment-8" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">24</label>
                        </div>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="nominal" value="{{ $nominal }}">
                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Next
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection