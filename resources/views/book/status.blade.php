@extends('layouts.app')


@section('title')
    {{$newCustomer['ref']}} - Booking Preview
@endsection


@section('content')
    <div>



        <div class="bg-nin-green" style="height: 500px;"></div>


        <div id="printableArea" style="margin-top: -500px;">
            
                <div class="max-w-2xl mx-auto">
                    <div class="text-white text-center overflow-hidden">
                        <div class="mt-10 text-4xl font-bold">
                            Confirmation Of Reservation
                        </div>
                        <div class="mt-1">
                            @if($newCustomer['appointment']->status === \App\Models\Appointment::TOPAYONCAPTURE)
                                Your are to pay when you come for capture. Remember to come with your reference number <b>#{{$newCustomer['ref']}}</b>
                                and bring along your <b>BVN No</b> if you have one.<br/>.
                                An email will be sent shortly, to confirm your appointment booking. Come with the email for your NIN capture
                            @else
                                Your payment was successful and your appointment with reference number <b>#{{$newCustomer['ref']}}</b> has been booked.
                                An email will be sent shortly, to confirm your appointment booking.
                            @endif
                        </div>
                    </div>
                </div>

                <div class="max-w-2xl mx-auto">
                    {{-- <form action="{{route('processTransaction')}}" class="mt-10 mb-20 bg-white rounded-lg shadow-lg"> --}}
                    <form action="{{route('processManualBooking')}}" method="POST" class="mt-10 mb-20 bg-white rounded-lg shadow-lg">
                        @csrf
                        @include('common.error-and-message')

                        <div class="text-center text-2xl font-bold p-6">
                            Ref #{{$newCustomer['ref']}}
                        </div>

                        <div class="border-t overflow-auto">


                            <div class="section">
                                <div>
                                    <div>
                                        1
                                    </div>
                                </div>
                                <div>
                                    User Info
                                </div>
                            </div>

                            <div class="my-10 space-y-6">
                                <div class="flex mx-20">
                                    <div class="w-10 flex-shrink-0">
                                        <span class="fa fa-user text-2xl"></span>
                                    </div>
                                    <div>
                                        <div>
                                            Full Name
                                        </div>
                                        <div class="text-lg font-bold">
                                            {{$newCustomer['user_name']}}
                                        </div>
                                    </div>
                                </div>
                                <div class="flex mx-20">
                                    <div class="w-10 flex-shrink-0">
                                        <span class="fa fa-at text-2xl"></span>
                                    </div>
                                    <div>
                                        <div>
                                            Email Address
                                        </div>
                                        <div class="text-lg font-bold">
                                            {{$newCustomer['user_email']}}
                                        </div>
                                    </div>
                                </div>
                                <div class="flex mx-20">
                                    <div class="w-10 flex-shrink-0">
                                        <span class="fa fa-phone text-2xl"></span>
                                    </div>
                                    <div>
                                        <div>
                                            Phone Number
                                        </div>
                                        <div class="text-lg font-bold">
                                            {{$newCustomer['user_phone']}}
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="section mt-10">
                                <div>
                                    <div>
                                        2
                                    </div>
                                </div>
                                <div>
                                    Appointment Info
                                </div>
                            </div>
                            
                            <div class="my-10 space-y-6">
                                <div class="flex mx-20">
                                    <div class="w-10 flex-shrink-0">
                                        <span class="fa fa-calendar text-2xl"></span>
                                    </div>
                                    <div>
                                        <div>
                                            Service Type Selected
                                        </div>
                                        <div class="text-lg font-bold">
                                            {{$serviceName}}
                                        </div>
                                    </div>
                                </div>
                                <div class="flex mx-20">
                                    <div class="w-10 flex-shrink-0">
                                        <span class="fa fa-calendar text-2xl"></span>
                                    </div>
                                    <div>
                                        <div>
                                            Appointment Date
                                        </div>
                                        <div class="text-lg font-bold">
                                            {{$newCustomer['date']->format("M d, Y h:i A")}}
                                        </div>
                                    </div>
                                </div>
                                <div class="flex mx-20">
                                    <div class="w-10 flex-shrink-0">
                                        <span class="fa fa-clock text-2xl"></span>
                                    </div>
                                    <div>
                                        <div>
                                            Appointment Time
                                        </div>
                                        <div class="text-lg font-bold">
                                            {{date('h:i A', strtotime($newCustomer['start_time']))}}
                                        </div>
                                    </div>
                                </div>
                                <div class="flex mx-20">
                                    <div class="w-10 flex-shrink-0">
                                        <span class="fa fa-clock-o text-2xl"></span>
                                    </div>
                                    <div>
                                        <div>
                                            Appointment Duration
                                        </div>
                                        <div class="text-lg font-bold">
                                            {{$newCustomer['appointmentDurationInMinutes']}} mins
                                        </div>
                                    </div>
                                </div>
                                @if($newCustomer['card_type'] === \App\Models\Appointment::CARD_TYPE_PVC)
                                    <div class="flex mx-20">
                                        <div class="w-10 flex-shrink-0">
                                            <span class="fa fa-map-marker text-2xl"></span>
                                        </div>
                                        <div>
                                            <div>
                                                NIN PVC Card will be delivered to your address
                                            </div>
                                            <div class="text-lg font-bold">
                                                {{$newCustomer['delivery_address']}}, {{$newCustomer['postal_code']}}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            


                            <div class="section mt-10">
                                <div>
                                    <div>
                                        3
                                    </div>
                                </div>
                                <div>
                                    Payment Info
                                </div>
                            </div>
                            
                            <div class="my-10 space-y-6">
                                <div class="flex mx-20">
                                    <div class="w-10 flex-shrink-0">
                                        <span class="fa fa-money text-2xl"></span>
                                    </div>
                                    <div>
                                        <div>
                                            Subtotal
                                        </div>
                                        <div class="text-lg font-bold">
                                            £ {{$newCustomer['amount']}}
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="flex mx-20">
                                    <div class="w-10 flex-shrink-0">
                                        <span class="fa fa-money text-2xl"></span>
                                    </div>
                                    <div>
                                        <div>
                                            VAT
                                        </div>
                                        <div class="text-lg font-bold">
                                            £ 0
                                        </div>
                                    </div>
                                </div> --}}
                                @if($newCustomer['card_type'] === \App\Models\Appointment::CARD_TYPE_PVC)
                                    <div class="flex mx-20">
                                        <div class="w-10 flex-shrink-0">
                                            <span class="fa fa-money text-2xl"></span>
                                        </div>
                                        <div>
                                            <div>
                                                You requested NIN PVC Card print out and delivery
                                            </div>
                                            <div class="text-lg font-bold">
                                                £  {{$newCustomer['pvc_print_delivery_cost']}}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="flex mx-20">
                                    <div class="w-10 flex-shrink-0">
                                        <span class="fa fa-money text-2xl"></span>
                                    </div>
                                    <div>
                                        <div>
                                            Total
                                        </div>
                                        <div class="text-lg font-bold">
                                            £ {{$newCustomer['amount'] + (($newCustomer['card_type'] === \App\Models\Appointment::CARD_TYPE_PVC) ? $newCustomer['pvc_print_delivery_cost'] : 0)}} 
                                        </div>
                                    </div>
                                </div>
                                <div class="border-t pt-8">

                                    <button type="submit" onclick="printDiv('printableArea')" class="mx-auto btn btn-lg btn-nin-orange font-bold">
                                        Print
                                    </button>
                                    <div class="text-center mt-2 text-fade">
                                        You will pay when you come for NIN capture
                                        <br/><span style="color: brown;"><b>We only accept Cash/Card Payment during NIN capture.</b></span>
                                    </div>
                                    {{-- <div class="text-center mt-2 text-fade">
                                        Secured online payment
                                    </div> --}}

                                </div>

                            </div>
                            


                        </div>

                    </form>
                </div>

        </div>

        

    </div>
@endsection


@section('js')
    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection






