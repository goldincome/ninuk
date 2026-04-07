@extends('layouts.admin')


@section('title')
    Closed Dates
@endsection


@section('css')
    <style>
        .admin-sidebar-closed-durations{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
@endsection


@section('content')
    <div class="container">

        <div class="page-title-account">
            <div>
                All Closed Dates
            </div>
            <div class="pull-right">
                <a href="{{route('admin.closed-durations.create')}}" class="btn btn-nin-green">
                    Add New Closed Date
                </a>
            </div>
        </div>
        <div>
            @include('common.error-and-message')
            <div class="table-container">
                <table class="table table-auto table-border table-align">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date From</th>
                            <th>Date To</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @forelse ($closedDurations as $closedDuration)

                            <tr>
                                <td>
                                    {{$closedDuration->title}}
                                </td>

                                <td>
                                    <div>
                                        {{$closedDuration->date_from->format("M d, Y")}}
                                    </div>
                                   
                                </td>
                                <td>  
                                    <div>
                                        {{$closedDuration->date_to->format("M d, Y")}}
                                    </div>
                                    
                                </td>
                                <td>
                                    {{$closedDuration->location->location_name ?? ''}}
                                </td>
                                <td>
                                    @if($closedDuration->status)
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
                                    
                                        <button id="dropdownButton" data-dropdown-toggle="dropdown{{$closedDuration->id}}" class="dropdown" type="button">
                                            Option
                                            <span class="fa fa-angle-down ml-2"></span>
                                        </button>
                                        <div id="dropdown{{$closedDuration->id}}" class="dropdown-menu-nav hidden">
                                            <ul class="py-1" aria-labelledby="dropdownButton">
                                                <li>
                                                    <a href="{{route('admin.closed-durations.edit', $closedDuration->id)}}" class="dropdown-menu-option">
                                                        Edit Closed Date
                                                    </a>
                                                </li>
                                                <li>
                                                    <form  method="POST" id= "dform" action="{{route('admin.closed-durations.destroy', $closedDuration->id)}}">
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
                                <td colspan="4">
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

            {{$closedDurations->links()}}

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