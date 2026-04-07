@extends('layouts.admin')


@section('title')
    Homes
@endsection


@section('css')
    <style>
        .admin-sidebar-homes{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
@endsection


@section('content')
    <div class="container">
        
        <div class="page-title-account">
            <div>
                All Homes
            </div>
            <div class="pull-right">
                
            </div>
        </div>
        
        
        <div>
        
            <div class="table-container">
                <table class="table table-auto table-border table-align">
                    <thead>
                        <tr>
                            <th style="min-width: 150px;">Date Created</th>
                            <th style="min-width: 350px;">Home</th>
                            <th style="min-width: 150px;">Total Bookings</th>
                            <th style="min-width: 150px;">Action</th>
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
                                    18
                                </div>
                            </td>

                            <td>

                                <div>
                                    <button id="dropdownButton" data-dropdown-toggle="dropdown1" class="dropdown" type="button">
                                        Option
                                        <span class="fa fa-angle-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton">
                                            <li>
                                                <a href="/homes/12345678" class="dropdown-menu-option">View</a>
                                            </li>
                                        </ul>
                                    </div>
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
                                    18
                                </div>
                            </td>

                            <td>

                                <div>
                                    <button id="dropdownButton" data-dropdown-toggle="dropdown1" class="dropdown" type="button">
                                        Option
                                        <span class="fa fa-angle-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton">
                                            <li>
                                                <a href="/homes/12345678" class="dropdown-menu-option">View</a>
                                            </li>
                                        </ul>
                                    </div>
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
                                    18
                                </div>
                            </td>

                            <td>

                                <div>
                                    <button id="dropdownButton" data-dropdown-toggle="dropdown1" class="dropdown" type="button">
                                        Option
                                        <span class="fa fa-angle-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton">
                                            <li>
                                                <a href="/homes/12345678" class="dropdown-menu-option">View</a>
                                            </li>
                                        </ul>
                                    </div>
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
                                    18
                                </div>
                            </td>

                            <td>

                                <div>
                                    <button id="dropdownButton" data-dropdown-toggle="dropdown1" class="dropdown" type="button">
                                        Option
                                        <span class="fa fa-angle-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton">
                                            <li>
                                                <a href="/homes/12345678" class="dropdown-menu-option">View</a>
                                            </li>
                                        </ul>
                                    </div>
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
                                    18
                                </div>
                            </td>

                            <td>

                                <div>
                                    <button id="dropdownButton" data-dropdown-toggle="dropdown1" class="dropdown" type="button">
                                        Option
                                        <span class="fa fa-angle-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton">
                                            <li>
                                                <a href="/homes/12345678" class="dropdown-menu-option">View</a>
                                            </li>
                                        </ul>
                                    </div>
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
                                    18
                                </div>
                            </td>

                            <td>

                                <div>
                                    <button id="dropdownButton" data-dropdown-toggle="dropdown1" class="dropdown" type="button">
                                        Option
                                        <span class="fa fa-angle-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton">
                                            <li>
                                                <a href="/homes/12345678" class="dropdown-menu-option">View</a>
                                            </li>
                                        </ul>
                                    </div>
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
                                    18
                                </div>
                            </td>

                            <td>

                                <div>
                                    <button id="dropdownButton" data-dropdown-toggle="dropdown1" class="dropdown" type="button">
                                        Option
                                        <span class="fa fa-angle-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton">
                                            <li>
                                                <a href="/homes/12345678" class="dropdown-menu-option">View</a>
                                            </li>
                                        </ul>
                                    </div>
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
                                    18
                                </div>
                            </td>

                            <td>

                                <div>
                                    <button id="dropdownButton" data-dropdown-toggle="dropdown1" class="dropdown" type="button">
                                        Option
                                        <span class="fa fa-angle-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton">
                                            <li>
                                                <a href="/homes/12345678" class="dropdown-menu-option">View</a>
                                            </li>
                                        </ul>
                                    </div>
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
                                    18
                                </div>
                            </td>

                            <td>

                                <div>
                                    <button id="dropdownButton" data-dropdown-toggle="dropdown1" class="dropdown" type="button">
                                        Option
                                        <span class="fa fa-angle-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton">
                                            <li>
                                                <a href="/homes/12345678" class="dropdown-menu-option">View</a>
                                            </li>
                                        </ul>
                                    </div>
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
                                    18
                                </div>
                            </td>

                            <td>

                                <div>
                                    <button id="dropdownButton" data-dropdown-toggle="dropdown1" class="dropdown" type="button">
                                        Option
                                        <span class="fa fa-angle-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton">
                                            <li>
                                                <a href="/homes/12345678" class="dropdown-menu-option">View</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            @include('common.pagination')

        </div>
            
    </div>
@endsection