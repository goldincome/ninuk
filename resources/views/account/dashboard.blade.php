@extends('layouts.app')


@section('title')
    Dashboard
@endsection


@section('css')
    <style>
        .account-sidebar-dashboard{
            background: rgb(229 231 235);
        }
    </style>
@endsection


@section('content')
    <div>
        
        <div class="top-wide">
            <div>
                <div>
                    Dashboard
                </div>
                <div>
                    <a href="/account">Account</a>
                    <span>/</span>
                    <a href="/account/dashboard">Dashboard</a>
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

                    @include('common.dashboard-data')

                </div>
                
            </div>
        </div>
    </div>
@endsection