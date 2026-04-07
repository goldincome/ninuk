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
                Add New Location
            </div>
            <div class="pull-right flex space-x-4">
                <a href="/admin/locations" class="btn btn-transparent-black">
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
                    Name
                    <span class="form-input-required">*</span>
                </label>
                <input type="text" name="name" class="form-input" value="{{old('name')}}"/>
            </div>
            <div class="form-group">
                <label>
                    Address
                    <span class="form-input-required">*</span>
                </label>
                <input type="text" name="address" class="form-input" value="{{old('address')}}"/>
            </div>
            <div class="form-group">
                <label>
                    Location Email Address
                    <span class="form-input-required">*</span>
                </label>
                <input type="email" name="email" class="form-input" value="{{old('email')}}"/>
            </div>
            <div class="form-group">
                <label>
                    Location Phone Number
                    <span class="form-input-required">*</span>
                </label>
                <input type="tel" name="phone" class="form-input" value="{{old('phone')}}"/>
            </div>
            <div class="form-group">
                <label>
                    Assign Admin
                    <span class="form-input-required">*</span>
                </label>
                <select name="admin" id="" class="form-input">
                    <option value="">- Select Admin -</option>
                    <option value="">Daniel Elijah</option>
                    <option value="">Daniel Elijah</option>
                    <option value="">Daniel Elijah</option>
                    <option value="">Daniel Elijah</option>
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
                    Add Location
                </button>
            </div>

        </form>
    </div>
@endsection
