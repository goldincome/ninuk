@extends('layouts.admin')


@section('title')
    Appointments
@endsection


@section('css')
    <style>
        .admin-sidebar-appointments{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
@endsection


@section('content')
    <div class="container">

        <div class="page-title-account">
            <div>
                All Appointments
            </div>
            <div>

            </div>
        </div>


        <div class="p-6 pb-2 mb-6 bg-white rounded-lg shadow">
            <form action="" id="searchForm" method="get">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 pb-4">

                    <div>
                        <label>
                            Start Date
                            <span class="form-input-required">*</span>
                        </label>
                        <input type="date" name="start_date" class="form-input" value="{{request('start_date')}}">
                    </div>

                    <div>
                        <label>
                            End Date
                            <span class="form-input-required">*</span>
                        </label>
                        <input type="date" name="end_date" class="form-input" value="{{request('end_date')}}">
                    </div>

                    <div>
                        <label>
                            Search
                            <span class="form-input-required">*</span>
                        </label>
                        <input type="search" name="search" placeholder="Search appointments" class="form-input" value="{{request('search')}}">
                    </div>

                    <div>
                        <label>
                            Select Location
                            <span class="form-input-required">*</span>
                        </label>
                        <select name="location_id" class="form-input">
                            <option value="">All Locations</option>
                            @foreach ($locations as $location)
                                <option value="{{$location->id}}"
                                    @if($location->id == request()->location_id) selected @endif
                                >{{$location->location_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="hidden md:block lg:hidden xl:block"> &nbsp;</label>
                        <div class="flex space-x-2">
                            <button class="btn btn-nin-green" type="submit">Submit</button>
                            <button class="btn btn-transparent-black" name="download_report" id="downloadReport" value={{true}} type="submit">
                                {{-- Download --}}
                                <span class="fa fa-download text-xl"></span>
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        <div>

            <div class="tabs">
                <div class="grid grid-cols-2">
                    <a href="/admin/appointments?status=upcoming" class="active">
                        Upcoming Appointments
                    </a>
                    <a href="/admin/appointments">
                        All Appointments
                    </a>
                </div>
            </div>

            <div class="mt-4 table-container">
                <table class="table table-auto table-border table-align">
                    <thead>
                        <tr>
                            <th style="min-width: 150px;">Reference No</th>
                            <th>Location</th>
                            <th>Service Type</th>
                            <th>User Details</th>
                            <th>Appointment Details</th>
                            <th>Duration</th>
                            <th>Amount Paid</th>
                            <th>Status</th>
                            <th>Card Type</th>
                            <th>Delivery Details</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($appointments as $appointment)
                            <tr>
                                <td>
                                    #{{$appointment->ref}}

                                </td>
                                <td>
                                    {{$appointment->location->location_name}}
                                </td>

                                <td>
                                   {{ strtoupper($appointment->serviceType->name) }}
                                </td>

                                <td>
                                    <div class="font-bold">
                                        {{$appointment->user_name}}
                                    </div>
                                    <div>
                                        {{$appointment->user_phone}}
                                    </div>
                                    <div>
                                        {{$appointment->user_email}}
                                    </div>
                                </td>

                                <td>
                                    <div class="font-bold">
                                        {{$appointment->date->format('M d, Y')}}
                                    </div>
                                    <div class="font-bold">
                                        {{$appointment->date->format('h:i a')}}
                                    </div>
                                </td>

                                <td>
                                    {{$appointment->duration}} mins
                                </td>

                                <td>
                                    <div>
                                        £{{$appointment->amount}}
                                    </div>
                                </td>

                                <td>
                                    @if($appointment->status == \App\Models\Appointment::UPCOMING)
                                        <div class="label label-red">
                                            Upcoming
                                        </div>
                                    @elseif($appointment->status == \App\Models\Appointment::COMPLETED)
                                        <div class="label label-green">
                                            Completed
                                        </div>
                                    @elseif($appointment->status == \App\Models\Appointment::PAYMENT_FAILED)
                                        <div class="label label-red">
                                            Payment Failed
                                        </div>
                                    @elseif($appointment->status == \App\Models\Appointment::CANCELLED)
                                        <div class="label label-red">
                                            Cancelled/Refunded
                                        </div>
                                    @elseif($appointment->status == \App\Models\Appointment::TOPAYONCAPTURE)
                                        <div class="label label-red">
                                            To Pay Offline
                                        </div>
                                    @endif

                                </td>
                                <td>
                                    {{$appointment->card_type}}
                                </td>
                                <td>
                                    <div class="font-bold">
                                        {{$appointment->postal_code}}
                                    </div>
                                    <div>
                                        {{$appointment->delivery_address}}
                                    </div>

                                </td>
                                <td>
                                    {{$appointment->created_at->format('M d, Y')}}
                                </td>
                                <td>
                                    <div>
                                        <button id="dropdownButton" data-dropdown-toggle="dropdown{{$appointment->id}}" class="dropdown" type="button">
                                            Option
                                            <span class="fa fa-angle-down ml-2"></span>
                                        </button>
                                        <div id="dropdown{{$appointment->id}}" class="dropdown-menu-nav hidden" >
                                            @if($appointment->status != \App\Models\Appointment::CANCELLED)
                                                <ul class="py-1" aria-labelledby="dropdownButton{{$appointment->id}}">
                                                    @if($appointment->status != \App\Models\Appointment::COMPLETED)
                                                        <li>
                                                            <a href="{{route('admin.appointmentReschedule', $appointment->id)}}" class="dropdown-menu-option">Reschedule</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('admin.markAsDone', $appointment->id)}}" class="dropdown-menu-option">Mark as Done</a>
                                                        </li>
                                                    @endif
                                                    @if($appointment->status == \App\Models\Appointment::UPCOMING || \App\Models\Appointment::TOPAYONCAPTURE)
                                                    <form method="POST" action="{{route('admin.cancelAppointment', $appointment->id)}}">
                                                        @csrf
                                                        <li><button type="submit" class="dropdown-menu-option" 
                                                            onclick="return confirm('Are you sure you want to cancel and refund this appointment\nOnce done, it cannot be undone');">
                                                            Cancel/Refund</button>
                                                            {{-- <a href="{{route('admin.cancelAppointment', $appointment->id)}}"  class="dropdown-menu-option">Cancel/Refund</a> --}}
                                                        </li>
                                                    </form>
                                                    @endif
                                                </ul>
                                            @endif
                                        </div>
                                    </div>

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="12">
                                    <div class="table-info">
                                        <span class="fa fa-list"></span>
                                        <div class="italic mt-3 text-lg">
                                            No appointments yet
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{$appointments->links()}}
        </div>

    </div>
@endsection

