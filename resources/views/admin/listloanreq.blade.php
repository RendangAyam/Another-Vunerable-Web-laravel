@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-white ">
    <div class="relative max-w-6xl mx-auto flex-col">
        <h1 class="my-2 w-full inline-flex py-3 text-2xl font-medium text-gray-900">
            Loan Request
        </h1>
        <div class="flex flex-col">
            <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                        ID Loan
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                        Card Number
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                        Nominal
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                        Total Payment
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                        monthly Payment
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                        KTP
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Approve</span>
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Reject</span>
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Reject KTP</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$list)    
                                <tr class="bg-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        No Data
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        No Data
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        No Data
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        No Data
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        No Data
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        No Data
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        No Data
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        -
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        -
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        -
                                    </td>
                                </tr> 
                                @else
                                    @foreach ($list as $item => $data)
                                    <!-- Odd row -->
                                    @if($loop->iteration %2 == 0)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{$data->id}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{$data->cardnumber}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$data->created_at}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$data->nominal}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$data->totalpayment}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$data->monthlypayment}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <a href="{{'../storage/'.$data->ktp}}">KTP</a>
                                            {{-- {{$data->ktp}} --}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$data->status}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            {{-- <form action="{{ route('credittransfer/transfer', $data->destcard )}}" method="POST"> --}}
                                                <form action="{{ route('admin/listloan/approve') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$data->id}}">
                                                    <input type="hidden" name="cardnumber" value="{{$data->cardnumber}}">
                                                    <input type="hidden" name="nominal" value="{{$data->nominal}}">
                                                    <input type="submit" class="bg-transparent text-indigo-600 hover:text-indigo-900 font-bold" value="Approve">
                                                </form>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form action="{{ route('admin/listloan/reject') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$data->id}}">
                                                <input type="submit" class="bg-transparent text-indigo-600 hover:text-indigo-900 font-bold" value="Reject">
                                            </form>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form action="{{ route('admin/listloan/rejectktp') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="cardnumber" value="{{$data->cardnumber}}">
                                                <input  type="submit" class="bg-transparent text-indigo-600 hover:text-indigo-900 font-bold" value="Reject KTP">
                                            </form>
                                        </td>
                                    </tr>
                                    @else 
                                    <!-- Even row -->
                                    <tr class="bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{$data->id}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{$data->cardnumber}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$data->created_at}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$data->nominal}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$data->totalpayment}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$data->monthlypayment}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <a href="{{'../storage/'.$data->ktp}}">KTP</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$data->status}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            {{-- <form action="{{ route('credittransfer/transfer', $data->destcard )}}" method="POST"> --}}
                                                <form action="{{ route('admin/listloan/approve') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$data->id}}">
                                                    <input type="hidden" name="cardnumber" value="{{$data->cardnumber}}">
                                                    <input type="hidden" name="nominal" value="{{$data->nominal}}">
                                                    <input type="submit" class="bg-transparent text-indigo-600 hover:text-indigo-900 font-bold" value="Approve">
                                                </form>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form action="{{ route('admin/listloan/reject') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$data->id}}">
                                                <input type="submit" class="bg-transparent text-indigo-600 hover:text-indigo-900 font-bold" value="Reject">
                                            </form>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form action="{{ route('admin/listloan/rejectktp') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="cardnumber" value="{{$data->cardnumber}}">
                                                <input  type="submit" class="bg-transparent text-indigo-600 hover:text-indigo-900 font-bold" value="Reject KTP">
                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <h1 class="my-2 w-full inline-flex py-3 text-2xl font-medium text-gray-900">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection