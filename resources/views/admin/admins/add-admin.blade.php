@extends('layouts.admin')


@section('title')
    Admin
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
                @if(Route::currentRouteName() != 'admin.editAdmin')
                    Add New Admin
                @else
                    Edit Admin:  {{$admin->name}}
                @endif
            </div>
            <div class="pull-right flex space-x-4">
                <a href="/admin/admin" class="btn btn-transparent-black">
                    <span class="fa fa-angle-left mr-2"></span>
                    Back
                </a>
            </div>
        </div>


     <div class="bg-white p-4">
        <form action="{{route('register')}}" class="max-w-md border p-4" method="post">
            @csrf
            <div class="form-group">
                <label>
                    Full Name
                    <span class="form-input-required">*</span>
                </label>
                <input type="text" name="name" class="form-input" value="{{old('name')}}"/>
            </div>
            <div class="form-group">
                <label>
                    Email
                    <span class="form-input-required">*</span>
                </label>
                <input type="text" name="email" class="form-input" value="{{old('email')}}"/>
            </div>
            <div class="form-group">
                <label>
                    Phone
                    <span class="form-input-required">*</span>
                </label>
                <input type="text" name="phone" class="form-input" value="{{old('phone')}}"/>
            </div>
            <div class="form-group">
                <label>
                    Location
                    <span class="form-input-required">*</span>
                </label>
                <select name="location_id" id="" class="form-input">
                    @foreach ($locations as $location)
                        <option value="{{$location->id}}">{{$location->location_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>
                    Role
                    <span class="form-input-required">*</span>
                </label>
                <select name="user_type" id="" class="form-input">
                    <option value="1">Admin</option>
                    <option value="2">Super Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label>
                    Status
                    <span class="form-input-required">*</span>
                </label>
                <select name="status" id="" class="form-input">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <div class="pt-2">
                <button type="submit" class="btn btn-nin-green btn-block">
                    Add Admin
                </button>
            </div>

        </form>
    </div>
@endsection
