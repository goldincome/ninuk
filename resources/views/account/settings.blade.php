@extends('layouts.app')


@section('title')
    Settings
@endsection


@section('css')
    <style>
        .account-sidebar-settings{
            background: rgb(229 231 235);
        }
    </style>
@endsection


@section('content')
    <div>
        
        <div class="top-wide">
            <div>
                <div>
                    Settings
                </div>
                <div>
                    <a href="/account">Account</a>
                    <span>/</span>
                    <a href="/account/settings">Settings</a>
                </div>
            </div>
            <div></div>
        </div>

        <div class="container py-8 sm:py-12">
            <div class="sm:flex sm:space-x-10">
            
                
                <div class="hidden sm:block">
                    @include('common.user-sidebar')
                </div>

                
                <div class="flex-grow sm:pt-3">
                                        
                    <div class="page-title-account">
                        <div>
                            Account settings
                        </div>
                    </div>

                    <div>

                        <form method="post" action="">

                            <div class="mt-10 w-full max-w-md mx-auto md:mx-0 lg:w-96">
                                
                                <div class="form-group">
                                    <label>
                                        Old Password
                                        <span class="form-input-required">*</span>
                                    </label>
                                    <input type="password" name="password" placeholder="XXXXXXXX" class="form-input" />
                                </div>
        
                                <div class="form-group">
                                    <label>
                                        New Password
                                        <span class="form-input-required">*</span>
                                    </label>
                                    <input type="password" name="new_password" placeholder="XXXXXXXX" class="form-input" />
                                </div>
        
                                <div class="form-group">
                                    <label>
                                        Retype Password
                                        <span class="form-input-required">*</span>
                                    </label>
                                    <input type="password" name="retype_password" placeholder="XXXXXXXX" class="form-input" />
                                </div>
        
                                <button type="submit" class="btn btn-lg btn-block btn-nin-orange mt-8">
                                    Change Password
                                </button>

                                <hr class="my-6">
        
                                <div class="mt-5 text-sm font-semibold text-gray-500">
                                    Can't remember your old password?
                                    <br>
                                    <a href="/forgot-password" class="text-nin-green hover:underline">Reset password</a>
                                </div>
        
                            </div>
                            
                        </form>

                    </div>

                </div>
                
            </div>
        </div>
    </div>
@endsection