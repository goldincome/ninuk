@extends('layouts.app')

@section('title')
    Apply for Your Nigerian Tax Identification Number - TIN number nigeria in the UK
@endsection

@section('description')
    Register to process your Nigerian Tax Identification Number(TIN) right here in UK for Nigerians in diaspora (mostly UK). Apply now!
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $(".faq-home-question").click(function() {
                var this_question = $(this);
                var this_answer = this_question.next(".faq-home-answer");

                if (this_answer.hasClass("hidden")) {
                    this_question.children(".fa").removeClass("fa-plus").addClass("fa-minus");
                    this_answer.removeClass("hidden");
                } else {
                    this_question.children(".fa").removeClass("fa-minus").addClass("fa-plus");
                    this_answer.addClass("hidden");
                }
            });

        });

        function closebanner(index) {
            try {
                $(".ad-banner-1").addClass("hidden");
            } catch (e) {}
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
                            Apply for Your Nigerian Tax Identification Number(TIN Number) right here in the UK
                        </div>

                        <div class="mt-6 md:leading-6 font-light opacity-70">
                            Are you a Nigerian in the UK needing a Tax Identification Number (TIN) for your business,
                            financial transactions, or other official purposes? Our streamlined service makes the
                            application process simple and fast.
                        </div>
                        <div class="font-extrabold text-3xl md:text-4xl xl:text-3xl leading-10">
                            Starting from £{{ $tin ? $tin->ourService->price : '35' }}
                        </div>
                        <div class="mt-6 flex space-x-2">
                            <a href="{{ route('pre-checkout.show', $tin->slug) }}" class="btn btn-nin-green btn-lg">
                                Apply Now
                            </a>
                            <a href="{{ route('tin') }}#requirements" class="btn btn-transparent-black btn-lg">
                                See Requirements
                            </a>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2 hidden md:block">
                    <div class="flex justify-end" style="height: 500px">
                        <img src={{ asset('img/bgs/nigeria-tax-indentification-number-tin.png') }}
                            alt="TIN Tax Card Application" class="h-full object-contain" />
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

        @include('common.tin-requirements')

        <div id="how" class="py-20 relative">
            <div class="relative z-10 container">
                <div>

                    <div class="mb-16">
                        <div class="font-extrabold text-3xl md:text-4xl xl:text-5xl leading-10">
                            How to Get Nigerian Tax Identification Number
                        </div>
                        <div class="mt-2 text-lg">
                            Our application process is designed to be seamless and straightforward.
                        </div>
                    </div>

                    <div class="mx-auto overflow-hidden grid sm:grid-cols-2 md:grid-cols-3 gap-4 xl:gap-8">

                        <div class="h-full block p-8 xl:p-14 rounded-xl shadow-sm bg-white">
                            <div>
                                <span class="fa fa-wpforms text-6xl text-nin-green"></span>
                            </div>
                            <div class="mt-6">
                                <div class="text-xl lg:text-3xl font-semibold">
                                    Submit Your Application
                                </div>
                                <div class="mt-2 sm:mt-4 font-light">
                                    Fill in the required information online, and
                                    submit your payment to confirm your application.
                                    <div class="font-extrabold text-2xl md:text-2xl xl:text-2xl leading-10">
                                        From £{{ $tin ? $tin->ourService->price : '35' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="h-full block p-8 xl:p-14 rounded-xl shadow-sm text-white bg-nin-green">
                            <div>
                                <span class="fa fa-file-upload text-6xl text-white"></span>
                            </div>
                            <div class="mt-6">
                                <div class="text-xl lg:text-3xl font-semibold">
                                    Make payment online
                                </div>
                                <div class="mt-2 sm:mt-4 font-light">
                                    Make payment and submit your document. We
                                    ensure all details are correct before processing.
                                </div>
                            </div>
                        </div>

                        <div class="h-full block p-8 xl:p-14 rounded-xl shadow-sm bg-white">
                            <div>
                                <span class="fa fa-credit-card text-6xl text-nin-green"></span>
                            </div>
                            <div class="mt-6">
                                <div class="text-xl lg:text-3xl font-semibold">
                                    Receive Your Tax TIN Number
                                </div>
                                <div class="mt-2 sm:mt-4 font-light">
                                    Once processed, we will notify you. You can collect your official Tax TIN Number from our
                                    office or have it delivered.
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
                        <img src={{ asset('img/bgs/why-need-tin-card.png') }} alt="Why you need a TIN tax card"
                            class="w-full my-auto relative" />
                    </div>
                    <div class="w-full md:w-6/12">
                        <div class="font-extrabold text-3xl md:text-4xl xl:text-5xl leading-10">
                            Why do I need a
                            <br>
                            TIN Number?
                        </div>
                        <div class="mt-12 space-y-8 md:mr-10">
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    A mandatory requirement for opening and operating business accounts in Nigeria.
                                </div>
                            </div>
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    Required for official tax filings and other government transactions.
                                </div>
                            </div>
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    Serves as a unique identifier for all your financial and business activities.
                                </div>
                            </div>
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    Essential for property sales and other major financial transactions in Nigeria.
                                </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <a href="{{ route('pre-checkout.show', $tin->slug) }}" class="btn btn-nin-green btn-lg">
                                Apply Now
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
                        <img src={{ asset('img/bgs/why-i-need-tin.png') }} alt="Why you need a TIN tax card"
                            class="w-full my-auto relative" />
                    </div>
                </div>
            </div>

        </div>

        <div class="relative bg-nin-green">
            <div class="relative z-10 container">
                <div
                    class="py-20 sm:py-32 px-6 md:px-12 max-w-5xl flex items-center text-center flex-col mx-auto text-white">
                    <div class="text-3xl md:text-4xl xl:text-5xl font-semibold">
                        Facing issues with your
                        <br class="hidden xl:block" />
                        Tax TIN application?
                    </div>
                    <div class="mt-5">
                        Look no further. We are an accredited partner authorised to facilitate TIN tax card applications for
                        Nigerians in the UK, ensuring a smooth and reliable process without stress and delays.
                    </div>
                    <div class="flex space-x-4 mt-5">
                        <a href="{{ route('pre-checkout.show', $tin->slug) }}" class="btn text-black bg-white btn-lg shadow-lg">
                            Apply Now
                        </a>
                    </div>
                </div>
            </div>
            <div class="bg-img-under bg-wavy"></div>
        </div>

        @include('common.tin-faqs')

        <div>
            <div class="mt-10 -mb-36 md:-mb-56 relative z-10">
                <div class="container">
                    <div class="max-w-4xl mx-auto">
                        <div
                            class="py-10 md:py-20 mx-auto bg-color-red flex bg-map-red bg-nin-green rounded-xl overflow-hidden">
                            <div class="m-auto">
                                <div
                                    class="px-4 whitespace-normal mt-4 text-white text-center text-2xl sm:text-3xl md:text-4xl font-semibold xl:leading-7">
                                    Get your official Nigerian Tax TIN Number Now!
                                </div>
                                <div class="flex px-4 mt-3 sm:mt-6 xl:mt-10">
                                    <div class="m-auto flex space-x-2 md:space-x-4">
                                        <a href="{{ route('pre-checkout.show', $tin->slug) }}"
                                            class="btn text-black bg-white btn-lg shadow-lg">
                                            <span class="fa fa-calendar mr-2"></span>
                                            Book an Appointment
                                        </a>
                                    </div>
                                </div>
                                <div class="text-center mt-2">
                                    <a href="{{ route('contactUs') }}" class="text-white hover:underline">Contact us for
                                        further assistance</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h-36 md:h-56 bg-black"></div>
        </div>
    </div>
@endsection
