@extends('layouts.admin')


@section('title')
    Create New Location
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
                <a href="{{route('admin.locations.index')}}" class="btn btn-transparent-black">
                    <span class="fa fa-angle-left mr-2"></span>
                    Back
                </a>
            </div>
        </div>


     <div class="bg-white p-4">
        <form action="{{route('admin.locations.store')}}" class="max-w-md border p-4" method="post">
            @csrf
            <div class="form-group">
                <label>
                    Location Name
                    <span class="form-input-required">*</span>
                </label>
                <input type="text" name="location_name" class="form-input" value="{{old('location_name')}}"/>
            </div>
            <div class="form-group">
                <label>
                    Location Address
                    <span class="form-input-required">*</span>
                </label>
                <input type="text" name="location_address" class="form-input" value="{{old('location_address')}}"/>
            </div>
            <div class="form-group">
                <label>
                    Contact Phone
                    <span class="form-input-required">*</span>
                </label>
                <input type="text" name="contact_phone" class="form-input" value="{{old('contact_phone')}}"/>
            </div>
            <div class="form-group">
                <label>
                    Contact Name
                    <span class="form-input-required">*</span>
                </label>
                <input type="text" name="contact_name" class="form-input" value="{{old('contact_name')}}"/>
            </div>
            <div class="form-group">
                <label>
                    Contact Email
                    <span class="form-input-required">*</span>
                </label>
                <input type="email" name="contact_email" class="form-input" value="{{old('contact_email')}}"/>
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
