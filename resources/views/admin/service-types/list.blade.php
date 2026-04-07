@extends('layouts.admin')


@section('title')
    Service Types
@endsection


@section('css')
    <style>
        .admin-sidebar-service-types{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
@endsection


@section('content')
    <div class="container">

        <div class="page-title-account">
            <div>
                Type Of Services Offered
            </div>
            
        </div>
        <div>
            @include('common.error-and-message')
            <div class="table-container">
                <table class="table table-auto table-border table-align">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @forelse ($serviceTypes as $serviceType)

                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{$serviceType->name}}
                                </td>

                                <td>
                                    <div>
                                        {{$serviceType->description}}
                                    </div>
                                   
                                </td>
                                <td>
                                    
                                        <button id="dropdownButton" data-dropdown-toggle="dropdown{{$serviceType->id}}" class="dropdown" type="button">
                                            Option
                                            <span class="fa fa-angle-down ml-2"></span>
                                        </button>
                                        <div id="dropdown{{$serviceType->id}}" class="dropdown-menu-nav hidden">
                                            <ul class="py-1" aria-labelledby="dropdownButton">
                                                <li>
                                                    <a href="{{route('admin.service-types.edit', $serviceType->id)}}" class="dropdown-menu-option">
                                                        Edit Service Type
                                                    </a>
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