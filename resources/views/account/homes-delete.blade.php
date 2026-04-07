@extends('layouts.app')


@section('title')
    Delete Home - 12345678
@endsection


@section('css')
    <style>
        .account-sidebar-homes{
            background: rgb(229 231 235);
        }
    </style>
@endsection


@section('content')
    <div>
        
        <div class="top-wide">
            <div>
                <div>
                    Delete home
                </div>
                <div>
                    <a href="/account">Account</a>
                    <span>/</span>
                    <a href="/account/homes">My Homes</a>
                    <span>/</span>
                    <a href="/account/homes/delete/12345678">Delete</a>
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
                            Delete home - 12345678
                        </div>
                        <div class="pull-right">
                            <a href="/account/homes" class="btn btn-transparent-black btn-sm">
                                <span class="fa fa-angle-left mr-1"></span>
                                Back
                            </a>
                        </div>
                    </div>
                    <div>



                        <div class="border-t-2">
                            <div class="w-full mx-auto md:mx-0">

                                <form action="/account/homes" method="get">

                                    <div class="">
                                        <div class="font-bold text-red-500 mt-4 mb-4">
                                            Are you sure you want to delete this home listing?
                                        </div>
                                        <div>
                                            <ul class="space-y-4 list-disc ml-10">
                                                <li>
                                                    You will not be able to recover deleted data
                                                </li>
                                                <li>
                                                    All bookings associated with this home listing will be lost
                                                </li>
                                                <li>
                                                    All pending processes such as payments, enquiries, and others, will be lost
                                                </li>
                                                <li>
                                                    Users will not be able to book this home anymore
                                                </li>
                                                <li>
                                                    You can recreate this home (as a new listing) in <a href="/account/homes/add" class="underline hover:text-nin-orange">Add your home</a>
                                                </li>
                                                <li>
                                                    All initial associated with the previous listing will not be transferred to this new listing
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="border-t mt-8 pt-6 flex space-x-4 justify-end">
                                        <a href="/account/homes" class="btn btn-transparent-black">
                                            Cancel
                                        </a>
                                        <button type="submit" class="btn text-white bg-red-500">
                                            Delete home
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>


                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection