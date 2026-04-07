@extends('layouts.admin')


@section('title')
    Reschedule Appointment
@endsection


@section('css')
    <style>
        .admin-sidebar-users{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
@endsection


@section('content')
    <div class="container">
        <div class="page-title-account">
            <div>
               Reschedule Appointment #{{$appointment->ref}}
            </div>
            <div class="pull-right flex space-x-4">
                <a href="/admin/users" class="btn btn-nin-green btn-sm">
                    <span class="fa fa-angle-left mr-2"></span>
                    Back
                </a>
            </div>
        </div>


        <div class="bg-white p-4">
            <form action="{{route('admin.appointmentRescheduleUpdate', $appointment)}}" class="max-w-md border p-4" method="POST">
                @csrf
                <div class="form-group">
                    <label>
                        Full Name
                        <span class="form-input-required">*</span>
                    </label>
                    <input type="text" disabled class="form-input" value="{{$appointment->user_name}}"/>
                </div>

                <div class="form-group">
                    <label>
                        Email Address
                        <span class="form-input-required">*</span>
                    </label>
                    <input type="email" class="form-input" disabled value="{{$appointment->user_email}}"/>
                </div>

                <div class="form-group">
                    <label>
                       Select Location
                        <span class="form-input-required">*</span>
                    </label>
                    <select name="location_id" class="form-input" id="selectLocation" required>
                        <option selected disabled>-- Select Location --</option>
                        @foreach ($locations as $location)
                            <option value="{{$location->id}}"
                                @if ($location->id == $appointment->location_id)
                                    selected
                                @endif
                                >{{$location->location_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>
                        Appointment Date
                        <span class="form-input-required">*</span>
                    </label>
                    <input type="date" class="form-input" name="date" min='<?php echo date("Y-m-d");?>' value="{{$appointment->date->format('Y-m-d')}}" id="appointmentDate"/>
                </div>

                <div class="form-group">
                    <label>
                        Appointment Time
                        <span class="form-input-required">*</span>
                    </label>
                    <select name="time" class="form-input" id="appointmentTime" data-selectedTime="11">
                        <option value="{{$appointment->date->format('h:m A')}}">{{$appointment->date->format('h:m A')}}</option>
                    </select>
                </div>

                <div class="pt-2">
                    <button type="submit" class="btn btn-nin-green btn-block">
                       Reschedule Appointment
                    </button>
                </div>

            </form>

        </div>

    </div>
@endsection

@section('js')
    <script>
        $(function() {
            $("#selectLocation").change(function(e) {
                $('#appointmentTime')
                .empty()
                .append($("<option />").text('-- Select Time --'));
                $("#appointmentDate").val('');
            });

            $("#appointmentDate").change(function(e) {
                e.preventDefault();
                let location_id = $('#selectLocation').val();
                var date = $(this).val();
                $.ajax({
                    type: "POST",
                    url: '/bookings/getAvailableTimeSlot',
                    data: {date, location_id},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        let availableTime = data['availableTime'];
                        var $dropdown = $("#appointmentTime");
                        $dropdown.empty();
                        $dropdown.append($("<option />").text('-- Select Time --'));
                        for (i = 0; i < availableTime.length; ++i) {
                            $dropdown.append($("<option />")
                            .attr("disabled", availableTime[i]['status']==false)
                            .val(availableTime[i]['time'])
                            .text(availableTime[i]['time']));
                        }
                    },
                    error: function (data) {

                    }
                });
            });
        });
    </script>
@endsection
