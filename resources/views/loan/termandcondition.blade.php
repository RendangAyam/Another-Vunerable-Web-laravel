@extends('layouts.master')

@section('content')

<div class="bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        Terms and Conditions
        </h2>
    </div>

    <div class="my-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" action="{{route('loan/create/nominal')}}" method="POST">
                <div align="justify">
                    1. Your consent to the Terms of Use shall be deemed as and shall constitute Your application to obtain Loan Facility and any Transaction You make using Another Vunerable Web shall be deemed as and shall constitute a request to disburse the Loan Facility, and if the request is approved based on our assessment, the Transaction Value will be deemed as Your loan amount channelled from the Lender(s) (“Loan”).
                    <br><br>2. You understand that Your failure to pay or repay the Loan may result in (i) collection activities being carried out by Another Vunerable Web, the Lender or any other party appointed by Another Vunerable Web and/or the Lender against the Borrower; (ii) the Borrower being reported to the Financial Services Authority; and (iii) adjustments to the Borrower’s creditworthiness record or rating at Another Vunerable Web and/or Lender.
                    <br><br>3. This Terms of Use, in part or in full, including any of its features or services may be changed, modified or added from time to time based on Our own policies as can be seen through the Platform from time to time or as We notify to You, either through a Notification or announcement on the Platform, electronic mail, Your phone number registered on the Application and/or other means of communication. You are deemed to agree to these changes when You continue to use the Another Vunerable Web service after the date the changes, modifications and/or variations take effect. If You do not agree to these changes, modifications and/or variations, You must stop accessing or using Another Vunerable Web services, provided that You are required to first settle and pay off all of Your outstanding or payable obligations.
                </div>
                <div class="flex items-center">
                    <input id="default-checkbox" type="checkbox" value="1" name="term" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Has Read and Agree with Terms and conditions</label>
                </div>
                @csrf
                @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif
                
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