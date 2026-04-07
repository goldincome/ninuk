@extends('layouts.app')


@section('title')
    Profile
@endsection


@section('css')
    <style>
        .account-sidebar-profile{
            background: rgb(229 231 235);
        }
    </style>
@endsection


@section('content')
    <div>
        
        <div class="top-wide">
            <div>
                <div>
                    Profile
                </div>
                <div>
                    <a href="/account">Account</a>
                    <span>/</span>
                    <a href="/account/profile">Profile</a>
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
                            My Profile
                        </div>
                    </div>

                    <div>

                        <form method="post" action="">

                            <div class="mt-10 w-full max-w-md mx-auto md:mx-0 lg:w-96">
                                
                                <div class="form-group">
                                    <label>
                                        FullName
                                        <span class="form-input-required">*</span>
                                    </label>
                                    <input type="text" name="name" placeholder="eg: John Doe" class="form-input" />
                                </div>
        
                                <div class="form-group">
                                    <label>
                                        Email Address
                                        <span class="form-input-required">*</span>
                                    </label>
                                    <input type="email" name="email" placeholder="eg: email@example.com" class="form-input" />
                                </div>
        
                                <div class="form-group">
                                    <label>
                                        Phone Number
                                        <span class="form-input-required">*</span>
                                    </label>
                                    <input type="email" name="email" placeholder="eg: +44 xx xxxx xxxx" class="form-input" />
                                </div>
        
                                <button type="submit" class="btn btn-lg btn-block btn-nin-orange mt-8">
                                    Edit Profile
                                </button>

                                <hr class="my-6">
        
                                <div class="mt-5 text-sm font-semibold text-gray-500">
                                    <a href="/account/settings" class="text-nin-green hover:underline">Change login password</a>
                                </div>
        
                            </div>
                            
                        </form>

                    </div>

                </div>
                
            </div>
        </div>
    </div>
@endsection