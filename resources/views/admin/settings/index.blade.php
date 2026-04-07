@extends('layouts.admin')


@section('title')
    Settings For All Locations
@endsection


@section('css')
    <style>
        .admin-sidebar-settings{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
@endsection


@section('content')
    <div class="container">

        <div class="page-title-account">
            <div>
                Settings - Select a location
            </div>
            <div class="pull-left">
                
            </div>
        </div>

        
        @include('common.error-and-message')

        <div class="space-y-2 pt-10 border-t-2">

            
            @forelse ($locations as $location)

                <a href="{{route('admin.settings.edit', $location->id)}}" class="flex space-x-4 justify-between px-8 py-6 bg-white rounded-lg border-2 border-transparent hover:border-nin-green">
                    <div class="flex-grow">
                        <div class="text-lg font-semibold">
                            {{$location->location_name}}
                        </div>
                        <div class="mt-1 text-fade">
                            {{$location->location_address}}
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <span class="fa fa-angle-right text-3xl"></span>
                    </div>
                </a>

            @empty

                <div class="table-info">
                    <span class="fa fa-map-marker"></span>
                    <div class="italic mt-3 text-lg">
                        No locations found
                    </div>
                    <div>
                        <a href="{{route('admin.locations.create')}}" class="mx-auto mt-3 btn btn-transparent-black">
                            Add location
                        </a>
                    </div>
                </div>

            @endforelse


            {{$locations->links()}}
            
        </div>


    </div>
@endsection
