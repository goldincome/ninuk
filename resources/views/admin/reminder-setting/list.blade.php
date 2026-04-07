@extends('layouts.admin')


@section('title')
    Email Reminder Notification Settings
@endsection


@section('css')
    <style>
        .admin-sidebar-reminder-settings{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
@endsection


@section('content')
    <div class="container">

        <div class="page-title-account">
            <div>
               Email Reminder Notification Settings
            </div>
            <div class="pull-right">
                <a href="{{route('admin.reminder-setting.create')}}" class="btn btn-nin-green">
                    Add New Reminder Notification
                </a>
            </div>
        </div>
        <div>
            @include('common.error-and-message')
            <div class="table-container">
                <table class="table table-auto table-border table-align">
                    <thead>
                        <tr>
                            <th>Number Of Days</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @forelse ($reminderSettings as $reminderSetting)

                            <tr>
                                <td>
                                    {{$reminderSetting->number_of_days}}
                                </td>

                                <td>
                                    @if($reminderSetting->status)
                                        <div class="label label-blue">
                                            Active
                                        </div>
                                    @else
                                        <div class="label label-red">
                                            Inactive
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    
                                        <button id="dropdownButton" data-dropdown-toggle="dropdown{{$reminderSetting->id}}" class="dropdown" type="button">
                                            Option
                                            <span class="fa fa-angle-down ml-2"></span>
                                        </button>
                                        <div id="dropdown{{$reminderSetting->id}}" class="dropdown-menu-nav hidden">
                                            <ul class="py-1" aria-labelledby="dropdownButton">
                                                <li>
                                                    <a href="{{route('admin.reminder-setting.edit', $reminderSetting->id)}}" class="dropdown-menu-option">
                                                        Edit Reminder Notification
                                                    </a>
                                                </li>
                                                <li>
                                                    <form  method="POST" id= "dform" action="{{route('admin.reminder-setting.destroy', $reminderSetting->id)}}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" onclick="confirmation()" class="dropdown-menu-option" >Delete Closed Date</button>
                                                    </form>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                        
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="3">
                                    <div class="table-info">
                                        <span class="fa fa-list"></span>
                                        <div class="italic mt-3 text-lg">
                                            No results found
                                        </div>
                                    </div>
                                </td>
                            </tr>
                                                   
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{$reminderSettings->links()}}

        </div>

    </div>
@endsection

@section('js')
    <script>
        function confirmation(){
                var result = confirm("Are you sure to delete?");
                if(result){
                    document.getElementById('dform').submit();
                }
        }
    
    </script>
@endsection