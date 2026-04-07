@extends('layouts.admin')


@section('title')
    Dashboard
@endsection


@section('css')
    <style>
        .admin-sidebar-dashboard{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
@endsection


@section('content')
    <div>
        
            
        <div class="container">
                
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <a href="/admin/appointments" class="dashboard-box">
                    <div>
                        <span class="fa fa-calendar-check"></span>
                    </div>
                    <div>
                        <div>
                            All Appointments
                        </div>
                        <div>
                            {{$data['all_appointment']}}
                        </div>
                    </div>
                </a>

                <a href="/admin/appointments?status=upcoming" class="dashboard-box">
                    <div>
                        <span class="fa fa-calendar-check"></span>
                    </div>
                    <div>
                        <div>
                            Upcoming Appointments
                        </div>
                        <div>
                            {{$data['total_upcoming_appointment']}}
                        </div>
                    </div>
                </a>

                <a href="/admin/payments" class="dashboard-box">
                    <div>
                        <span class="fa fa-credit-card"></span>
                    </div>
                    <div>
                        <div>
                            All Payments
                        </div>
                        <div>
                            £ {{number_format($data['total_payment'], 2, '.', ',')}}
                        </div>
                    </div>
                </a>

                <a href="/admin/messages" class="dashboard-box">
                    <div>
                        <span class="fa fa-envelope"></span>
                    </div>
                    <div>
                        <div>
                            Unread Messages
                        </div>
                        <div>
                            {{$data['total_unread_messages']}}
                        </div>
                    </div>
                </a>

            </div>



                    
            <hr class="my-10 border-gray-300">



            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <a href="/admin/settings" class="border-2 border-gray-300 p-4 flex hover:bg-gray-300 rounded-lg">
                    <div class="flex-grow flex">
                        <div class="my-auto flex">
                            <span class="fa fa-cog my-auto text-lg mr-3"></span>
                            Settings
                        </div>
                    </div>
                    <div class="flex-shrink-0 w-5 text-right">
                        <span class="fa fa-angle-right"></span>
                    </div>
                </a>

                <div class="border-2 border-gray-300 p-4 flex hover:bg-gray-300 rounded-lg cursor-pointer">
                    <div class="flex-grow flex">
                        <div class="my-auto flex">
                            <span class="fa fa-sign-out my-auto text-lg mr-3"></span>
                            Logout
                        </div>
                    </div>
                    <div class="flex-shrink-0 w-5 text-right">
                        <span class="fa fa-angle-right"></span>
                    </div>
                </div>

            </div>


        </div>

        
    </div>
@endsection