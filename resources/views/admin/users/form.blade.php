@extends('layouts.admin')


@section('title')
    Users
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
                Add New User
            </div>
            <div class="pull-right flex space-x-4">
                <a href="/admin/users" class="btn btn-nin-green btn-sm">
                    <span class="fa fa-angle-left mr-2"></span>
                    Back
                </a>
            </div>
        </div>
        
        
        <div class="bg-white p-4">
        
            <form action="/admin/users" class="max-w-md border p-4">

                
                <div class="form-group">
                    <label>
                        Full Name
                        <span class="form-input-required">*</span>
                    </label>
                    <input type="text" name="name" class="form-input" />
                </div>

                <div class="form-group">
                    <label>
                        Email Address
                        <span class="form-input-required">*</span>
                    </label>
                    <input type="email" name="email" class="form-input" />
                </div>

                <div class="form-group">
                    <label>
                        Phone Number
                        <span class="form-input-required">*</span>
                    </label>
                    <input type="tel" name="phoneNumber" class="form-input" />
                </div>

                <div class="form-group">
                    <label>
                        Role
                        <span class="form-input-required">*</span>
                    </label>
                    <select name="role" class="form-input">
                        <option value="">- Select role -</option>
                        <option value="">Super Admin</option>
                        <option value="">General Admin</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>
                        Email Address
                        <span class="form-input-required">*</span>
                    </label>
                    <select name="status" class="form-input">
                        <option value="">- Select status -</option>
                        <option value="">Active</option>
                        <option value="">Inactive</option>
                    </select>
                </div>

                <div class="pt-2">
                    <button type="submit" class="btn btn-nin-green btn-block">
                        Add User
                    </button>
                </div>

            </form>

        </div>
            
    </div>
@endsection