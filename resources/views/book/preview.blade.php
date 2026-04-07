@extends('layouts.app')


@section('title')
    {{$newCustomer['ref']}} - Booking Preview
@endsection


@section('content')
    <div>



        <div class="bg-nin-green" style="height: 500px;"></div>


        <div style="margin-top: -500px;">
            
                <div class="max-w-2xl mx-auto">
                    <div class="text-white text-center overflow-hidden">
                        <div class="mt-10 text-4xl font-bold">
                            Almost there
                        </div>
                        <div class="mt-1">
                            Please review your booking information below
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
                                    Service Info
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
                                            {{$serviceType->name}}
                                        </div>
                                    </div>
                                </div>
                                @if($newCustomer['is_booking_appointment'])
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
                                                {{str_replace('-', '',$newCustomer['appointmentDurationInMinutes'])}} mins
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($newCustomer['card_type'] === \App\Models\Appointment::CARD_TYPE_PRINT_OUT)
                                    @if($serviceType->slug == $serviceType::BANK_ACCOUNT)
                                        <div class="flex mx-20">
                                            <div class="w-10 flex-shrink-0">
                                                <span class="fa fa-map-marker text-2xl"></span>
                                            </div>
                                            <div>
                                                <div>
                                                    Bank Account Type
                                                </div>
                                                <div class="text-lg font-bold">
                                                Personal Account
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                @if($newCustomer['card_type'] === \App\Models\Appointment::CARD_TYPE_PVC)
                                    @if($serviceType->slug == $serviceType::BANK_ACCOUNT)
                                        <div class="flex mx-20">
                                            <div class="w-10 flex-shrink-0">
                                                <span class="fa fa-map-marker text-2xl"></span>
                                            </div>
                                            <div>
                                                <div>
                                                    Bank Account Type
                                                </div>
                                                <div class="text-lg font-bold">
                                                   Corporate Account
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        @if($serviceType->slug == $serviceType::NIN || $serviceType->slug == $serviceType::BVN
                                            || $serviceType->slug == $serviceType::BVN_PERSONAL_BANK_ACCOUNT
                                            || $serviceType->slug == $serviceType::BVN_CORPORATE_BANK_ACCOUNT)
                                            <div class="flex mx-20">
                                                <div class="w-10 flex-shrink-0">
                                                    <span class="fa fa-map-marker text-2xl"></span>
                                                </div>
                                                <div>
                                                    <div>
                                                        @if($serviceType->slug == $serviceType::NIN || $serviceType->slug == $serviceType::BVN)
                                                            {{ $serviceType->name  }} 
                                                        @else
                                                            {{ ucwords($serviceType::BVN) }} 
                                                        @endif
                                                        
                                                        PVC Card will be delivered to your address
                                                    </div>
                                                    <div class="text-lg font-bold">
                                                        {{$newCustomer['delivery_address']}}, {{$newCustomer['postal_code']}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
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
                                @if($serviceType->slug === $serviceType::PASSPORT_5_YEARS || 
                                    $serviceType->slug === $serviceType::PASSPORT_10_YEARS )
                                    <div class="flex mx-20">
                                        <div class="w-10 flex-shrink-0">
                                            <span class="fa fa-money text-2xl"></span>
                                        </div>
                                        <div>
                                            <div>
                                                Charges Apply
                                            </div>
                                            <div class="text-lg font-bold">
                                                Application charges will  be communicated to you shortly
                                            </div>
                                        </div>
                                    </div>
                                @else
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
                                    
                                    @if($newCustomer['card_type'] === \App\Models\Appointment::CARD_TYPE_PVC)
                                        @if($serviceType->slug == $serviceType::NIN || $serviceType->slug == $serviceType::BVN
                                            || $serviceType->slug == $serviceType::BVN_PERSONAL_BANK_ACCOUNT
                                            || $serviceType->slug == $serviceType::BVN_CORPORATE_BANK_ACCOUNT)
                                            <div class="flex mx-20">
                                                <div class="w-10 flex-shrink-0">
                                                    <span class="fa fa-money text-2xl"></span>
                                                </div>
                                                <div>
                                                    <div>
                                                        You requested 
                                                        @if($serviceType->slug == $serviceType::NIN || $serviceType->slug == $serviceType::BVN)
                                                            {{ $serviceType->name  }} 
                                                        @else
                                                            {{ ucwords($serviceType::BVN) }} 
                                                        @endif
                                                        PVC Card print out and delivery
                                                    </div>
                                                    <div class="text-lg font-bold">
                                                        £  {{$newCustomer['pvc_print_delivery_cost']}}
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        @else
                                            @if($serviceType->slug == $serviceType::BANK_ACCOUNT)
                                            <div class="flex mx-20">
                                                <div class="w-10 flex-shrink-0">
                                                    <span class="fa fa-money text-2xl"></span>
                                                </div>
                                                <div>
                                                    <div>
                                                        Corporate Account
                                                    </div>
                                                    <div class="text-lg font-bold">
                                                        £  {{$newCustomer['pvc_print_delivery_cost']}}
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endif
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
                                @endif
                                <div class="border-t pt-8 px-6">
                                        <div class="checkbox">
                                            <label class="cursor-pointer inline-block">
                                                <input type="checkbox" name="checkboxTerms" class="w-5 h-5 mt-px mr-2 form-input-checkbox float-left" required />
                                                <div class="overflow-hidden">
                                                    I acknowledge that the information I submitted is correct
                                                </div>
                                            </label>
                                        </div>
                                </div>

                                <div class="border-t pt-8">

                                        <button type="submit" class="mx-auto btn btn-lg btn-nin-green font-bold">
                                            Reserve My Booking Now
                                        </button>
                                        <div class="text-center mt-2 text-fade">
                                            You will pay when you come for capture/application
                                            <br/><span style="color: brown;"><b>We only accept Cash/Card Payment during capture/application.</b></span>
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