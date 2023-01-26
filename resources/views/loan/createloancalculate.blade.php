@extends('layouts.master')

@section('content')

<div class="bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            Create Loan
        </h2>
    </div>

    <div class="my-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-4 px-4 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" action="{{route('loan/create')}}" method="POST">
                @csrf
                <div>
                    <label for="nominal" class="block text-sm font-medium text-gray-700">
                        Nominal
                    </label>
                    <div class="mt-1">
                        Rp.{{number_format($nominal, 2, ",", ".")}}
                    </div>
                    <input type="hidden" name="nominal" value="{{$nominal}}">
                </div>
                <div>
                    <label for="installment" class="block text-sm font-medium text-gray-700">
                        Installment
                    </label>
                    <div class="mt-1">
                        {{$installment}} Month
                    </div>
                    <input type="hidden" name="installment" value="{{$installment}}">
                </div>
                <div>
                    <label for="adminfee" class="block text-sm font-medium text-gray-700">
                        Admin Fee
                    </label>
                    <div class="mt-1">
                        Rp.{{number_format($nominal*2/100, 2, ",", ".")}}
                    </div>
                </div>
                <div>
                    <label for="total" class="block text-sm font-medium text-gray-700">
                        Total Payment
                    </label>
                    <div class="mt-1">
                        Rp.{{number_format($total, 2, ",", ".")}}
                    </div>
                    <input type="hidden" name="total" value="{{$total}}">
                </div>
                <div>
                    <label for="monthly" class="block text-sm font-medium text-gray-700">
                        Monlhty Payment
                    </label>
                    <div class="mt-1">
                        Rp.{{number_format($monthly, 2, ",", ".")}}
                    </div>
                    <input type="hidden" name="monthly" value="{{$monthly}}">
                </div>
                @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif
                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection