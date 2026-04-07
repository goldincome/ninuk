@extends('layouts.admin')


@section('title')
    Locations
@endsection


@section('css')
    <style>
        .admin-sidebar-locations{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
@endsection


@section('content')
    <div class="container">

        <div class="page-title-account">
            <div>
                All Locations
            </div>
            <div class="pull-right">
                <a href="{{route('admin.locations.create')}}" class="btn btn-nin-green">
                    Add Location
                </a>
            </div>
        </div>
        <div>
            @include('common.error-and-message')
            <div class="table-container">
                <table class="table table-auto table-border table-align">
                    <thead>
                        <tr>
                            <th>Location Name</th>
                            <th>Address</th>
                            <th>Contact Info</th>
                            <th>Admin</th>

                            {{-- <th>Phone</th>
                            <th>Contact Name</th>
                            <th>Email</th>
                             --}}
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @forelse ($locations as $location)

                            <tr>
                                <td>
                                    {{$location->location_name}}
                                </td>

                                <td>
                                    {{$location->location_address}}
                                </td>
                                <td>
                                    <div>
                                        <a href="mail:{{$location->contact_phone}}">
                                            {{$location->contact_phone}}
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{$location->contact_email}}">
                                            {{$location->contact_email}}
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        {{$location->contact_name}}
                                    </div>
                                    <a href="mail:{{$location->contact_email}}">
                                        {{$location->contact_email}}
                                    </a>
                                </td>
                                <td>
                                    @if($location->status)
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
                                    
                                        <button id="dropdownButton" data-dropdown-toggle="dropdown{{$location->id}}" class="dropdown" type="button">
                                            Option
                                            <span class="fa fa-angle-down ml-2"></span>
                                        </button>
                                        <div id="dropdown{{$location->id}}" class="dropdown-menu-nav hidden">
                                            <ul class="py-1" aria-labelledby="dropdownButton">
                                                <li>
                                                    <a href="{{route('admin.locations.edit', $location->id)}}" class="dropdown-menu-option">
                                                        Edit Location
                                                    </a>
                                                </li>
                                                <li>
                                                    <form  method="POST" id= "dform" action="{{route('admin.locations.destroy', $location->id)}}">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="#" onclick="confirmation()" class="dropdown-menu-option">Delete Location</a>
                                                    </form>
                                                </li>
                                                <li>
                                                    <a href="{{route('admin.settings.edit', $location->id)}}" class="dropdown-menu-option">Manage Settings</a>
                                                
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
{{-- 
                            <tr>
                                <td>
                                Redwood Estate
                                </td>

                                <td>
                                    Unit 6, Block 3 Woolwich, Dockyard Industrial Estate, Woolwich Church St, Charlton, London SE18 5PQ
                                </td>
                                <td>
                                    <div>
                                        <a href="tel:+44(0)2032474747">
                                            +44 (0) 2032474747
                                        </a>
                                    </div>
                                    <div>
                                        <a href="mail:info@ninuk.co.uk">
                                            info@ninuk.co.uk
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        Admin name
                                    </div>
                                    <a href="mail:admin@ninuk.co.uk">
                                        admin@ninuk.co.uk
                                    </a>
                                </td>
                                <td>
                                    <div class="label label-red">
                                        Inactive
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="dropdown" type="button">
                                            Option
                                            <span class="fa fa-angle-down ml-2"></span>
                                        </button>
                                        <div id="dropdown" class="dropdown-menu-nav hidden">
                                            <ul class="py-1" aria-labelledby="dropdownButton">
                                                <li>
                                                    <a href="/admin/locations/form" class="dropdown-menu-option">Edit Location</a>
                                                </li>
                                                <li>
                                                    <a href="/admin/appoointments?location=location1" class="dropdown-menu-option">View Appointment</a>
                                                </li>
                                                <li>
                                                    <a href="/admin/settings" class="dropdown-menu-option">Manage Settings</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                Redwood Estate
                                </td>

                                <td>
                                    Unit 6, Block 3 Woolwich, Dockyard Industrial Estate, Woolwich Church St, Charlton, London SE18 5PQ
                                </td>
                                <td>
                                    <div>
                                        <a href="tel:+44(0)2032474747">
                                            +44 (0) 2032474747
                                        </a>
                                    </div>
                                    <div>
                                        <a href="mail:info@ninuk.co.uk">
                                            info@ninuk.co.uk
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        Admin name
                                    </div>
                                    <a href="mail:admin@ninuk.co.uk">
                                        admin@ninuk.co.uk
                                    </a>
                                </td>
                                <td>
                                    <div class="label label-blue">
                                        Active
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="dropdown" type="button">
                                            Option
                                            <span class="fa fa-angle-down ml-2"></span>
                                        </button>
                                        <div id="dropdown" class="dropdown-menu-nav hidden">
                                            <ul class="py-1" aria-labelledby="dropdownButton">
                                                <li>
                                                    <a href="/admin/appoointments?location=location1" class="dropdown-menu-option">View Appointment</a>
                                                </li>
                                                <li>
                                                    <a href="/admin/settings" class="dropdown-menu-option">Manage Settings</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                Redwood Estate
                                </td>

                                <td>
                                    Unit 6, Block 3 Woolwich, Dockyard Industrial Estate, Woolwich Church St, Charlton, London SE18 5PQ
                                </td>
                                <td>
                                    <div>
                                        <a href="tel:+44(0)2032474747">
                                            +44 (0) 2032474747
                                        </a>
                                    </div>
                                    <div>
                                        <a href="mail:info@ninuk.co.uk">
                                            info@ninuk.co.uk
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        Admin name
                                    </div>
                                    <a href="mail:admin@ninuk.co.uk">
                                        admin@ninuk.co.uk
                                    </a>
                                </td>
                                <td>
                                    <div class="label label-blue">
                                        Active
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="dropdown" type="button">
                                            Option
                                            <span class="fa fa-angle-down ml-2"></span>
                                        </button>
                                        <div id="dropdown" class="dropdown-menu-nav hidden">
                                            <ul class="py-1" aria-labelledby="dropdownButton">
                                                <li>
                                                    <a href="/admin/appoointments?location=location1" class="dropdown-menu-option">View Appointment</a>
                                                </li>
                                                <li>
                                                    <a href="/admin/settings" class="dropdown-menu-option">Manage Settings</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                Redwood Estate
                                </td>

                                <td>
                                    Unit 6, Block 3 Woolwich, Dockyard Industrial Estate, Woolwich Church St, Charlton, London SE18 5PQ
                                </td>
                                <td>
                                    <div>
                                        <a href="tel:+44(0)2032474747">
                                            +44 (0) 2032474747
                                        </a>
                                    </div>
                                    <div>
                                        <a href="mail:info@ninuk.co.uk">
                                            info@ninuk.co.uk
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        Admin name
                                    </div>
                                    <a href="mail:admin@ninuk.co.uk">
                                        admin@ninuk.co.uk
                                    </a>
                                </td>
                                <td>
                                    <div class="label label-blue">
                                        Active
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="dropdown" type="button">
                                            Option
                                            <span class="fa fa-angle-down ml-2"></span>
                                        </button>
                                        <div id="dropdown" class="dropdown-menu-nav hidden">
                                            <ul class="py-1" aria-labelledby="dropdownButton">
                                                <li>
                                                    <a href="/admin/appoointments?location=location1" class="dropdown-menu-option">View Appointment</a>
                                                </li>
                                                <li>
                                                    <a href="/admin/settings" class="dropdown-menu-option">Manage Settings</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr> --}}


                        {{-- @empty --}}
                            {{--
                            <tr>
                                <td colspan="6">
                        @forelse ($locations as $location)
                        <tr>
                            <td>
                               {{$location->location_name}}
                            </td>
                            <td>
                                {{$location->location_address}}
                             </td>
                            <td>
                               {{$location->contact_phone}}
                            </td>
                            <td>
                               {{$location->contact_name}}
                            </td>
                            <td>
                                {{$location->contact_email}}
                             </td>
                            <td>
                               {{$location->status ? 'Active' : 'Disabled'}}
                            </td>
                            
                            <td>
                                <div>
                                    <a href="{{route('admin.locations.edit', $location->id)}}" class="btn btn-nin-green btn-sm">
                                        <span class="fa fa-envelope mr-2"></span>
                                        Edit
                                    </a> 
                                    <form  method="POST" id= "dform" action="{{route('admin.locations.destroy', $location->id)}}">
                                        @csrf
                                        @method('delete')
                                        <a href="#" onclick="confirmation()" class="btn btn-nin-green btn-sm">
                                            <span class="fa fa-envelope mr-2"></span>
                                            Delete
                                        </a>
                                    </form>
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
                            --}}
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{$locations->links()}}

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