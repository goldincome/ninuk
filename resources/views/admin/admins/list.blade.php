@extends('layouts.admin')


@section('title')
    Admins
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
                All Admins
            </div>
            <div class="pull-right">
                <a href="{{route('admin.newAdmin')}}" class="btn btn-nin-green">
                    Manage Admin
                </a>
            </div>
        </div>
        <div>

            <div class="table-container">
                <table class="table table-auto table-border table-align">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($admins as $admin)
                        <tr>
                            <td>
                               {{$admin->name}}
                            </td>

                            <td>
                               {{$admin->email}}
                            </td>
                            <td>
                               {{$admin->phone}}
                            </td>
                            <td>
                               {{$admin->location->location_name}}
                            </td>
                            <td>
                               {{$admin->status ? 'Active' : 'Disabled'}}
                            </td>
                            <td>
                                @if($admin->user_type ==  2)
                                    Super Admin
                                @else
                                    Admin
                                @endif
                            </td>
                            <td>
                                <div>
                                    {{-- <a href="{{route('admin.viewMessage', $admin)}}" class="btn btn-nin-green btn-sm">
                                        <span class="fa fa-envelope mr-2"></span>
                                        Open
                                    </a> --}}
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="7">
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

            {{$admins->links()}}

        </div>

    </div>
@endsection
