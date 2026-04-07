@extends('layouts.app')

@section('title')
   Register for your Nigerian BVN Number and open bank account in UK
@endsection

@section('description')
    BVN UK - Register to process your Nigerian BVN number and open new Nigerian Bank account right here in UK for Nigerians in diaspora (mostly UK).
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            
            $(".faq-bvn-question").click(function(){
                var this_question = $(this);
                var this_answer = this_question.next(".faq-home-answer");
                
                if (this_answer.hasClass("hidden")){
                    this_question.children(".fa").removeClass("fa-plus").addClass("fa-minus");
                    this_answer.removeClass("hidden");
                }
                else{
                    this_question.children(".fa").removeClass("fa-minus").addClass("fa-plus");
                    this_answer.addClass("hidden");
                }
            });

        });

        function toggleRequirements(id){
            $(".hte-div").addClass("hidden");
            $("#"+id).removeClass("hidden");
            $(".hte-indicator").addClass("invisible");
            $("."+id).children().eq(0).removeClass("invisible");
        }

        function closebanner(index){
            try{ 
                $(".ad-banner-1").addClass("hidden");
            }
            catch(e) {}
        }
    </script>
@endsection


@section('content')
    <div>
        @include('common.page-navlink')
        <div class="relative">
            <div class="container md:flex md:space-x-10 py-10 relative z-20">

                <div class="md:w-1/2 flex">
                    <div class="my-auto pt-8 pb-5">
                        <div class="font-extrabold text-3xl md:text-4xl xl:text-5xl leading-10">
                            Process your Nigerian BVN and/or Open Nigerian Bank Account
                            
                            right here in the UK
                        </div>

                        <div class="mt-6 md:leading-6 font-light opacity-70">
                            Are you a Nigerian residing in the UK? Do you need your BVN number/Bank Account?
                            You can now register and process your BVN number and open bank account hassle-free.</br> 
                            Book an appointment with us, submit your information within minutes and make your BVN/Bank Account available in a few days.
                        </div>
                        <div class="font-extrabold text-3xl md:text-4xl xl:text-3xl leading-10">
                            From £40
                        </div>
                        <div class="mt-6 flex space-x-2">
                            <a href="{{route('bookings.index')}}" class="btn btn-nin-green btn-lg">
                                Book Now
                            </a>
                            <a href="{{ route('bvn') }}#requirements" class="btn btn-transparent-black btn-lg">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2 hidden md:block">
                    <div class="flex justify-end" style="height: 500px">
                        <img src={{asset('img/bgs/bvn-bank-account.png')}} alt="logo" class="h-full object-contain" />
                    </div>
                </div>

            </div>

            <div class="w-full h-full opacity-40 img-bg3 absolute inset-0 z-10"></div>
        </div>




        <div>
            @include('common.wavy')
            <div class="transform rotate-180 bg-white">
                @include('common.wavy')
            </div>
        </div>



        @include('common.bvn-bank-acct-requirements')
        


        <div id="how" class="py-20 relative">
            <div class="relative z-10 container">
                <div>

                    <div class="mb-16">
                        <div class="font-extrabold text-3xl md:text-4xl xl:text-5xl leading-10">
                            How it works
                        </div>
                        <div class="mt-2 text-lg">
                            The process of obtaining your Nigerian BVN is seamless. It goes through the steps highlighted below
                        </div>
                    </div>

                    <div class="mx-auto overflow-hidden grid sm:grid-cols-2 md:grid-cols-3 gap-4 xl:gap-8">

                        <div class="h-full block p-8 xl:p-14 rounded-xl shadow-sm bg-white">
                            <div>
                                <span class="fa fa-calendar text-6xl text-nin-green"></span>
                            </div>
                            <div class="mt-6">
                                <div class="text-xl lg:text-3xl font-semibold">
                                    Schedule an appointment
                                </div>
                                <div class="mt-2 sm:mt-4 font-light">
                                    You can pick a convenient place, date, and time to schedule your appointment. Your payment approves your appointment.<br/>
                                    <div class="font-extrabold text-2xl md:text-2xl xl:text-2xl leading-10">
                                        From £40
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="h-full block p-8 xl:p-14 rounded-xl shadow-sm text-white bg-nin-green">
                            <div>
                                <span class="fa fa-desktop text-6xl text-white"></span>
                            </div>
                            <div class="mt-6">
                                <div class="text-xl lg:text-3xl font-semibold">
                                    Capture your data
                                </div>
                                <div class="mt-2 sm:mt-4 font-light">
                                    Visit our office with your documents on your appointment date to capture your biometrics and process your data during the scheduled appointment.
                                </div>
                            </div>
                        </div>

                        <div class="h-full block p-8 xl:p-14 rounded-xl shadow-sm bg-white">
                            <div>
                                <span class="fa fa-file text-6xl text-nin-green"></span>
                            </div>
                            <div class="mt-6">
                                <div class="text-xl lg:text-3xl font-semibold">
                                    Get your BVN Slip/Bank Account Number
                                </div>
                                <div class="mt-2 sm:mt-4 font-light">
                                    If you choose the option of BVN slip, you will collect it within 10 working days. If you opt for the BVN PVC Card, we will deliver the card to your specified address once the processing is completed.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="bg-img-under bg-spiral-under"></div>
        </div>




        <div id="why" class="md:pt-5 pb-20">

            <div class="container">
                <div class="md:flex md:space-x-8">
                    <div class="md:w-6/12 flex md:hidden mb-10 md:mb-0 rounded-xl overflow-hidden">
                        <img src={{asset('img/bgs/why-need-bvn.png')}} alt="nin" class="w-full my-auto relative" />
                    </div>
                    <div class="w-full md:w-6/12">
                        <div class="font-extrabold text-3xl md:text-4xl xl:text-5xl leading-10">
                            Why do I need
                            <br>
                            an BVN ?
                        </div>
                        <div class="mt-12 space-y-8 md:mr-10">
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    Unique identification across all banks
                                </div>
                            </div>
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    For easy processing of your government documents like NIN, International passport etc
                                </div>
                            </div>
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    For easy participation in future investment banking transactions and access credit opportunities.
                                </div>
                            </div>
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    The BVN enables you to link all your bank accounts across different banks
                                </div>
                            </div>
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    The BVN is a mandatory requirement for operating a bank account in Nigeria
                                </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <a href="{{route('bookings.index')}}" class="btn btn-nin-green btn-lg">
                                Book Now
                            </a>
                        </div>
                        <div class="mt-6">
                            <span class="text-gray-500">
                                For More Information, Visit the
                            </span>
                            <a href="/#faqs" class="text-nin-green pl-1 hover:underline">FAQs Section</a>
                        </div>
                    </div>
                    <div class="md:w-6/12 hidden md:flex rounded-xl overflow-hidden">
                        <img src={{asset('img/bgs/why-need-bvn.png')}} alt="nin" class="w-full my-auto relative" />
                    </div>
                </div>
            </div>

            

        </div>




        <div class="relative bg-nin-green">
            <div class="relative z-10 container">
                <div class="py-20 sm:py-32 px-6 md:px-12 max-w-5xl flex items-center text-center flex-col mx-auto text-white">
                    <div class="text-3xl md:text-4xl xl:text-5xl font-semibold">
                        Do you have issues
                        <br class="hidden xl:block" />
                        getting your BVN/Bank Account?
                    </div>
                    <div class="mt-5">
                        Look no further.
                        The Nigerian Government has authorized <a href="http://www.deacilprofessionals.com/" class="underline whitespace-nowrap">Deacil Professional Services</a> to process your BVN/Bank account opening without stress and delays.
                        We have the necessary skills and equipment to undertake BVN registration and opening bank account for Nigerians residing in the UK
                    </div>
                    <div class="flex space-x-4 mt-5">
                        <a href="{{route('bookings.index')}}" class="btn text-black bg-white btn-lg shadow-lg">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
            <div class="bg-img-under bg-wavy"></div>
        </div>

       {{-- @include('common.bvn-bank-acct-faqs') --}}

         <!-- Get Started Section -->
         <div>
            <div class="mt-10 -mb-36 md:-mb-56 relative z-10">
                <div class="container">
                    <div class="max-w-4xl mx-auto">
                        <div class="py-10 md:py-20 mx-auto bg-color-red flex bg-map-red bg-nin-green rounded-xl overflow-hidden">
                            <div class="m-auto">
                                <div class="px-4 whitespace-normal mt-4 text-white text-center text-2xl sm:text-3xl md:text-4xl font-semibold xl:leading-7">
                                    Open nigerian bank account from uk and get your Nigerian BVN number
                                </div>
                                <div class="flex px-4 mt-3 sm:mt-6 xl:mt-10">
                                    <div class="m-auto flex space-x-2 md:space-x-4">
                                        <a href="{{route('bookings.index')}}" class="btn text-black bg-white btn-lg shadow-lg">
                                            <span class="fa fa-calendar mr-2"></span>
                                            Book Now
                                        </a>
                                    </div>
                                </div>
                                <div class="text-center mt-2">
                                    <a href="{{ route('contactUs') }}" class="text-white hover:underline">Contact us for further assistance</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h-36 md:h-56 bg-black"></div>
        </div>
         <!-- End Get Started Section -->

    </div>
@endsection
