@extends('layouts.app')


@section('title')
    My Bookings
@endsection


@section('css')
    <style>
        .account-sidebar-bookings{
            background: rgb(229 231 235);
        }
    </style>
@endsection


@section('content')
    <div>
        
        <div class="top-wide">
            <div>
                <div>
                    Bookings
                </div>
                <div>
                    <a href="/account">Account</a>
                    <span>/</span>
                    <a href="/account/bookings">Bookings</a>
                </div>
            </div>
            <div></div>
        </div>

        <div class="container py-8 sm:py-12">
            <div class="sm:flex sm:space-x-10">
            
                
                <div class="hidden sm:block">
                    @include('common.user-sidebar')
                </div>

                
                <div class="flex-grow sm:pt-3">
                    <div class="page-title-account">
                        <div>
                            My Bookings
                        </div>
                    </div>
                    <div>



                        <div class="container-account table-container">
                            <table class="table table-auto table-border table-align">
                                <thead>
                                    <tr>
                                        <th style="min-width: 150px;">Entry Date</th>
                                        <th style="min-width: 350px;">Home</th>
                                        <th style="min-width: 150px;">Dates Booked</th>
                                        <th style="min-width: 150px;"># of Guests</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            March 02, 2022
                                        </td>

                                        <td>
                                            <div class="flex space-x-3 items-start">
                                                <a href="/homes/12345678" class="w-36 h-auto flex flex-shrink-0 bg-black overflow-hidden" style="min-height: 80px; max-height: 100px">
                                                    <img src="https://unsplash.it/500/382" alt="VHO" class="object-cover m-auto w-full h-full" />
                                                </a>
                                                <div>
                                                    <a href="/homes/12345678" class="font-bold hover:underline">
                                                        2BR with Bunkroom & free beach service
                                                    </a>
                                                    <div class="text-fade ellipsis-2-lines">
                                                        This beautiful condo has had a lot of recent upgrades:
                                                        New Living Room furniture in 2021, New Polywood balcony chairs in 2021
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <div>
                                                    <div>
                                                        Check In:
                                                    </div>
                                                    <div class="font-bold">
                                                        May 14, 2022
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <div>
                                                        Check Out:
                                                    </div>
                                                    <div class="font-bold">
                                                        June 23, 2022
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                {{-- 1 Adult --}}
                                                2 Adults
                                            </div>
                                            <div>
                                                0 Children
                                                {{-- 1 Child --}}
                                                {{-- 2 Children --}}
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            March 02, 2022
                                        </td>

                                        <td>
                                            <div class="flex space-x-3 items-start">
                                                <a href="/homes/12345678" class="w-36 h-auto flex flex-shrink-0 bg-black overflow-hidden" style="min-height: 80px; max-height: 100px">
                                                    <img src="https://unsplash.it/500/382" alt="VHO" class="object-cover m-auto w-full h-full" />
                                                </a>
                                                <div>
                                                    <a href="/homes/12345678" class="font-bold hover:underline">
                                                        2BR with Bunkroom & free beach service
                                                    </a>
                                                    <div class="text-fade ellipsis-2-lines">
                                                        This beautiful condo has had a lot of recent upgrades:
                                                        New Living Room furniture in 2021, New Polywood balcony chairs in 2021
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <div>
                                                    <div>
                                                        Check In:
                                                    </div>
                                                    <div class="font-bold">
                                                        May 14, 2022
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <div>
                                                        Check Out:
                                                    </div>
                                                    <div class="font-bold">
                                                        June 23, 2022
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                {{-- 1 Adult --}}
                                                2 Adults
                                            </div>
                                            <div>
                                                0 Children
                                                {{-- 1 Child --}}
                                                {{-- 2 Children --}}
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            March 02, 2022
                                        </td>

                                        <td>
                                            <div class="flex space-x-3 items-start">
                                                <a href="/homes/12345678" class="w-36 h-auto flex flex-shrink-0 bg-black overflow-hidden" style="min-height: 80px; max-height: 100px">
                                                    <img src="https://unsplash.it/500/382" alt="VHO" class="object-cover m-auto w-full h-full" />
                                                </a>
                                                <div>
                                                    <a href="/homes/12345678" class="font-bold hover:underline">
                                                        2BR with Bunkroom & free beach service
                                                    </a>
                                                    <div class="text-fade ellipsis-2-lines">
                                                        This beautiful condo has had a lot of recent upgrades:
                                                        New Living Room furniture in 2021, New Polywood balcony chairs in 2021
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <div>
                                                    <div>
                                                        Check In:
                                                    </div>
                                                    <div class="font-bold">
                                                        May 14, 2022
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <div>
                                                        Check Out:
                                                    </div>
                                                    <div class="font-bold">
                                                        June 23, 2022
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                {{-- 1 Adult --}}
                                                2 Adults
                                            </div>
                                            <div>
                                                0 Children
                                                {{-- 1 Child --}}
                                                {{-- 2 Children --}}
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            March 02, 2022
                                        </td>

                                        <td>
                                            <div class="flex space-x-3 items-start">
                                                <a href="/homes/12345678" class="w-36 h-auto flex flex-shrink-0 bg-black overflow-hidden" style="min-height: 80px; max-height: 100px">
                                                    <img src="https://unsplash.it/500/382" alt="VHO" class="object-cover m-auto w-full h-full" />
                                                </a>
                                                <div>
                                                    <a href="/homes/12345678" class="font-bold hover:underline">
                                                        2BR with Bunkroom & free beach service
                                                    </a>
                                                    <div class="text-fade ellipsis-2-lines">
                                                        This beautiful condo has had a lot of recent upgrades:
                                                        New Living Room furniture in 2021, New Polywood balcony chairs in 2021
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <div>
                                                    <div>
                                                        Check In:
                                                    </div>
                                                    <div class="font-bold">
                                                        May 14, 2022
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <div>
                                                        Check Out:
                                                    </div>
                                                    <div class="font-bold">
                                                        June 23, 2022
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                {{-- 1 Adult --}}
                                                2 Adults
                                            </div>
                                            <div>
                                                0 Children
                                                {{-- 1 Child --}}
                                                {{-- 2 Children --}}
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            March 02, 2022
                                        </td>

                                        <td>
                                            <div class="flex space-x-3 items-start">
                                                <a href="/homes/12345678" class="w-36 h-auto flex flex-shrink-0 bg-black overflow-hidden" style="min-height: 80px; max-height: 100px">
                                                    <img src="https://unsplash.it/500/382" alt="VHO" class="object-cover m-auto w-full h-full" />
                                                </a>
                                                <div>
                                                    <a href="/homes/12345678" class="font-bold hover:underline">
                                                        2BR with Bunkroom & free beach service
                                                    </a>
                                                    <div class="text-fade ellipsis-2-lines">
                                                        This beautiful condo has had a lot of recent upgrades:
                                                        New Living Room furniture in 2021, New Polywood balcony chairs in 2021
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <div>
                                                    <div>
                                                        Check In:
                                                    </div>
                                                    <div class="font-bold">
                                                        May 14, 2022
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <div>
                                                        Check Out:
                                                    </div>
                                                    <div class="font-bold">
                                                        June 23, 2022
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                {{-- 1 Adult --}}
                                                2 Adults
                                            </div>
                                            <div>
                                                0 Children
                                                {{-- 1 Child --}}
                                                {{-- 2 Children --}}
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            March 02, 2022
                                        </td>

                                        <td>
                                            <div class="flex space-x-3 items-start">
                                                <a href="/homes/12345678" class="w-36 h-auto flex flex-shrink-0 bg-black overflow-hidden" style="min-height: 80px; max-height: 100px">
                                                    <img src="https://unsplash.it/500/382" alt="VHO" class="object-cover m-auto w-full h-full" />
                                                </a>
                                                <div>
                                                    <a href="/homes/12345678" class="font-bold hover:underline">
                                                        2BR with Bunkroom & free beach service
                                                    </a>
                                                    <div class="text-fade ellipsis-2-lines">
                                                        This beautiful condo has had a lot of recent upgrades:
                                                        New Living Room furniture in 2021, New Polywood balcony chairs in 2021
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <div>
                                                    <div>
                                                        Check In:
                                                    </div>
                                                    <div class="font-bold">
                                                        May 14, 2022
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <div>
                                                        Check Out:
                                                    </div>
                                                    <div class="font-bold">
                                                        June 23, 2022
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                {{-- 1 Adult --}}
                                                2 Adults
                                            </div>
                                            <div>
                                                0 Children
                                                {{-- 1 Child --}}
                                                {{-- 2 Children --}}
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>


                        @include('common.pagination')


                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection