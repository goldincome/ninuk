@extends('layouts.admin')


@section('title')
    Payments
@endsection


@section('css')
    <style>
        .admin-sidebar-payments{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
@endsection


@section('content')
    <div class="container">

        <div class="page-title-account">
            <div>
                All Payments
            </div>
            <div>
                {{-- 
                <form action="" id="dateSearchForm" method="get">
                    <label class="relative block">
                        <input type="date" name="start_date" class="form-input w-full" style="padding-left: 40px !important;" id="dateSearchInput1" value="{{request('start_date')}}">
                   </label>
                    <label class="relative block">
                        <input type="date" name="end_date" class="form-input w-full" style="padding-left: 40px !important;" id="dateSearchInput2" value="{{request('end_date')}}">
                   </label>
                </form>
                <form action="">
                    <label class="relative block">
                        <div class="pointer-events-none w-10 h-full absolute flex">
                            <i class="fas fa-search m-auto"></i>
                        </div>
                        <input type="search" name="search" placeholder="Search Payment" class="form-input w-full" style="padding-left: 40px !important;">
                   </label>
                </form>
                 --}}
            </div>
        </div>


        <div class="p-6 pb-2 mb-6 bg-white rounded-lg shadow">
            <form action="" id="dateSearchForm" method="get">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 pb-4">

                    <div>
                        <label>
                            Start Date
                            <span class="form-input-required">*</span>
                        </label>
                        <input type="date" name="start_date" class="form-input" id="dateSearchInput1" value="{{request('start_date')}}">
                    </div>

                    <div>
                        <label>
                            End Date
                            <span class="form-input-required">*</span>
                        </label>
                        <input type="date" name="end_date" class="form-input" id="dateSearchInput2" value="{{request('end_date')}}">
                    </div>

                    <div>
                        <label>
                            Search
                            <span class="form-input-required">*</span>
                        </label>
                        <input type="search" name="search" placeholder="Search Payment" class="form-input" value="{{request('search')}}">
                    </div>

                    <div>
                        <label class="block md:hidden lg:block"> &nbsp;</label>
                        <div class="">
                            <button class="btn btn-nin-green btn-block" type="submit">Submit</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <div>

            <div class="tabs">
                <div class="grid grid-cols-3">
                    <a href="{{route('admin.payments.index')}}" class="active">
                        All Payments
                    </a>
                    <a href="{{route('admin.payments.index')}}?status={{\App\Models\Payment::PAYMENTSTATUS['completed']}}">
                        Successful Payments
                    </a>
                    <a href="{{route('admin.payments.index')}}?status={{\App\Models\Payment::PAYMENTSTATUS['failed']}}">
                        Failed Payments
                    </a>
                </div>
            </div>

            <div class="mt-4 table-container">
                <table class="table table-auto table-border table-align">
                    <thead>
                        <tr>
                            <th>Appointment Reference No</th>
                            <th>Amount Paid</th>
                            <th>Payment Status</th>
                            <th>Payment Gateway</th>
                            <th>Payment Reference No</th>
                            <th style="min-width: 150px;">Date Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($payments->isNotEmpty())
                            @foreach($payments as $payment)
                                <tr>
                                    <td>
                                        #{{$payment->appointment->ref }}
                                    </td>
                                    <td>
                                        <div>
                                            £  {{$payment->amount_paid  }}
                                        </div>
                                    </td>
                                    <td>
                                    @if($payment->payment_status == $payment::PAYMENTSTATUS['failed'] )
                                        <div class="label label-red">
                                            Failed
                                        </div>
                                    @endif

                                    @if($payment->payment_status == $payment::PAYMENTSTATUS['completed'] )
                                        <div class="label label-green">
                                            Completed
                                        </div>
                                    @endif

                                    @if($payment->payment_status == $payment::PAYMENTSTATUS['cancelled'] )
                                        <div class="label label-red">
                                            Cancelled/Refunded
                                        </div>
                                    @endif
                                    @if($payment->payment_status == $payment::PAYMENTSTATUS['awaiting'] )
                                        <div class="label label-red">
                                        To Pay Cash In Office
                                        </div>
                                    @endif
                                    </td>
                                    <td>
                                        {{$payment->payment_gateway }}
                                    </td>
                                    <td>
                                        #{{$payment->payment_ref_no }}
                                    </td>
                                    <td>
                                        {{$payment->created_at->format('M d, Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">
                                    <div class="table-info">
                                        <span class="fa fa-list"></span>
                                        <div class="italic mt-3 text-lg">
                                            No payments yet
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif


                    </tbody>
                </table>
            </div>

            {{$payments->links()}}

        </div>

    </div>
@endsection

@section('js')
   <script>
        $(function() {
            let selectedTime = $(this).attr('data-selectedTime');
            $("#dateSearchInput").change(function(e) {
                e.preventDefault();
                $("#dateSearchForm").submit()
            });
        });
   </script>
@endsection
