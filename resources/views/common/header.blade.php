
<div class="bg-white fixed z-40 shadow-sm w-full">
    <div class="container z-50 h-14 md:h-20 mx-auto flex">
        <div class="w-full my-auto flex justify-between">

            <div class="flex-shrink-0 my-auto">
                {{-- 
                <a href="/" class="text-3xl md:text-4xl font-bold py-2 text-nin-green font-lobster">
                    nin<span class="text-nin-orange">(uk)</span>.co.uk
                </a>
                --}}
                <a href="{{route('home')}}" class="w-full h-10 sm:h-16 block">
                    <img src={{asset('img/icons/logo-ninuk-deacil-3.png')}} alt="logo" class="w-full h-full object-contain " />
                </a>
            </div>

            <div class="flex-grow hidden lg:block">
                <div class="flex h-full justify-end">
                    {{-- <div class="flex my-auto space-x-8 lg:space-x-12 xl:mr-24"> --}}
                    <div class="flex my-auto space-x-8 ">
                        <a href="{{route('tin')}}" class="header-links {{ request()->routeIs('tin') ? 'active' : '' }}">
                            Tax Identification Number(TIN)
                        </a>
                        
                        <a href="{{route('home')}}" class="header-links {{ request()->routeIs('home') ? 'active' : '' }}">
                            NIN
                         </a>
                        <a href="{{route('bvn')}}" class="header-links {{ request()->routeIs('bvn') ? 'active' : '' }}">
                           BVN
                        </a>
                        
                        <a href="{{route('nigerianPassport')}}" class="header-links {{ request()->routeIs('nigerianPassport')  ? 'active' : '' }}">
                             Passport Application Assistance
                         </a>
                         <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"  class="header-links {{ (request()->routeIs('flightTicket') || request()->routeIs('npc-birth-certificate')) ? 'active' : '' }}"  type="button">
                            Other Services 
                        </button> 
                        <!-- Dropdown menu -->
                        <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                            <!--
                                <li>
                                    <a href="{{ route('home') }}" class="header-links block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        NIN Registration
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('bvn') }}" class="header-links block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        BVN/Bank Account Registration
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('nigerianPassport') }}" class="header-links block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Passport Application Assistance
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('tin') }}" class="header-links block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Tax Number(TIN) Application Assistance
                                    </a>
                                </li>
                            -->
                            <li>
                                <a href="{{ route('npc-birth-certificate') }}" class="header-links {{ request()->routeIs('npc-birth-certificate') ? 'active' : '' }} block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Birth Certificate Application Assistance
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('flightTicket') }}" class="header-links {{ request()->routeIs('flightTicket') ? 'active' : '' }} block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Cheap Flight Ticket To Nigeria
                                </a>
                            </li>
                            </ul>
                        </div>
                        <a href="{{route('contactUs')}}" class="header-links {{ request()->routeIs('contactUs') ? 'active' : '' }}">
                            Helpdesk
                        </a>
                       {{-- <a href="{{route('bookings.index')}}" class="header-links header-links-highlight">
                            Book Appointment
                        </a> --}}
                    </div>
                </div>
            </div>


            <div class="w-full block lg:hidden">
                <button type="button" id="dropdownButton" data-dropdown-toggle="dropdownHeaderMobileAccount" class="w-10 h-10 group hover:bg-nin-green flex float-right rounded cursor-pointer">
                    <span class="fa fa-bars text-xl m-auto group-hover:text-white" ></span>
                </button>

                <div id="dropdownHeaderMobileAccount" class="hidden w-full fixed min-h-screen z-40 top-14 inset-x-0 bg-black text-white bg-opacity-90 bg-blur">
                    <div aria-labelledby="dropdownButton">
                        <div>
                            <div class="h-screen py-20 overflow-auto overscroll-contain">
                                <div class="space-y-10 pb-14 text-center">
                                    
                                    
                                    <div>
                                        <a href="{{ route('home') }}" class="header-links-mobile {{ request()->routeIs('home') ? 'active' : '' }}">NIN Registration</a>
                                    </div>
                                    <div>
                                        <a href="{{ route('bvn') }}" class="header-links-mobile {{ request()->routeIs('bvn') ? 'active' : '' }} ">BVN/Bank Account Registration</a>
                                    </div>
                                    <div>
                                        <a href="{{ route('npc-birth-certificate') }}" class="header-links-mobile {{ request()->routeIs('npc-birth-certificate') ? 'active' : '' }}">Birth Certificate Application Assistance</a>
                                    </div>
                                    <div>
                                        <a href="{{ route('nigerianPassport') }}" class="header-links-mobile {{ request()->routeIs('nigerianPassport') ? 'active' : '' }}">Passport Application Assistance</a>
                                    </div>
                                    <div>
                                        <a href="{{ route('tin') }}" class="header-links-mobile {{ request()->routeIs('tin') ? 'active' : '' }}">Tax Number(TIN) Application Assistance</a>
                                    </div>
                                    <div>
                                        <a href="{{ route('flightTicket') }}" class="header-links-mobile {{ request()->routeIs('flightTicket') ? 'active' : '' }}">Cheap Flight Ticket To Nigeria</a>
                                    </div>
                                    
                                    <div>
                                        <a href="{{route('contactUs')}}" class="header-links-mobile {{ request()->routeIs('contactUs') ? 'active' : '' }}">
                                            Helpdesk
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<div class="h-14 md:h-20"></div>

