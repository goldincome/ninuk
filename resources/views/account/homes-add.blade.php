@extends('layouts.app')


@section('title')
    Add Homes
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
                    Add home
                </div>
                <div>
                    <a href="/account">Account</a>
                    <span>/</span>
                    <a href="/account/homes">My Homes</a>
                    <span>/</span>
                    <a href="/account/homes/add">Add</a>
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
                            Add home
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
                            <div class="pt-10 w-full mx-auto md:mx-0">

                                <form action="/account/homes" method="get">
                                    <div class="font-bold">
                                        Add your place and start earning
                                    </div>

                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-10 gap-y-0">


                                        <div class="mt-10 mb-5 border border-gray-200">
                                            <div class="flex space-x-3 px-4 py-4 bg-gray-200">
                                                <div>
                                                    <div class="w-6 h-6 flex bg-nin-green">
                                                        <div class="m-auto text-white">1</div>
                                                    </div>
                                                </div>
                                                <div>
                                                    About the place
                                                </div>
                                            </div>

                                            <div class="p-4">
                                                <div class="form-group">
                                                    <label>
                                                        How many bedrooms:
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <input type="number" name="bedroom" value="" class="form-input" />
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        How many bathrooms:
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <input type="number" name="bathrooms" value="" class="form-input" />
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        How many occupants (at maximum):
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <input type="number" name="occupants" value="" class="form-input" />
                                                </div>
                                            </div>
                                        </div>


                                        <div class="mt-10 mb-5 border border-gray-200">
                                            <div class="flex space-x-3 px-4 py-4 bg-gray-200">
                                                <div>
                                                    <div class="w-6 h-6 flex bg-nin-green">
                                                        <div class="m-auto text-white">2</div>
                                                    </div>
                                                </div>
                                                <div>
                                                    Description
                                                </div>
                                            </div>

                                            <div class="p-4">
                                                <div class="form-group">
                                                    <label>
                                                        Tell us about the place:
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <textarea name="desc" required class="form-input" style="height: 213px;"></textarea>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="mt-10 mb-5 border border-gray-200">
                                            <div class="flex space-x-3 px-4 py-4 bg-gray-200">
                                                <div>
                                                    <div class="w-6 h-6 flex bg-nin-green">
                                                        <div class="m-auto text-white">3</div>
                                                    </div>
                                                </div>
                                                <div>
                                                    Pictures and Price
                                                </div>
                                            </div>

                                            <div class="p-4">
                                                <div class="form-group">
                                                    <label>
                                                        Upload all pictures (maximum of 20):
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <input type="file" name="files[]" multiple="multiple" required="required" class="form-input" />
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Price (avg/night, in USD):
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <input type="number" name="price" value="" class="form-input" />
                                                </div>
                                            </div>
                                        </div>



                                        <div class="mt-10 mb-5 border border-gray-200">
                                            <div class="flex space-x-3 px-4 py-4 bg-gray-200">
                                                <div>
                                                    <div class="w-6 h-6 flex bg-nin-green">
                                                        <div class="m-auto text-white">4</div>
                                                    </div>
                                                </div>
                                                <div>
                                                    Location
                                                </div>
                                            </div>

                                            <div class="p-4">
                                                <div class="form-group">
                                                    <label>
                                                        City:
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <input type="text" name="city" value="" class="form-input" />
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        State:
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <input type="text" name="state" value="" class="form-input" />
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Country:
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <input type="text" name="country" value="" class="form-input" />
                                                </div>
                                            </div>
                                        </div>



                                        <div class="mt-10 mb-5 border border-gray-200">
                                            <div class="flex space-x-3 px-4 py-4 bg-gray-200">
                                                <div>
                                                    <div class="w-6 h-6 flex bg-nin-green">
                                                        <div class="m-auto text-white">5</div>
                                                    </div>
                                                </div>
                                                <div>
                                                    Activate
                                                </div>
                                            </div>

                                            <div class="p-4">
                                                <div class="form-group">
                                                    <label>
                                                        Give this place a name:
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <input type="text" name="name" value="" placeholder="Eg: 2BR with Bunkroom & free beach service" class="form-input" />
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Select characteristics:
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <div class="space-y-3">
                                                        <label class="cursor-pointer">
                                                            <div class="flex space-x-3">
                                                                <div class="my-auto flex">
                                                                    <input type="checkbox" name="" id="" class="form-input-checkbox">
                                                                </div>
                                                                <div class="my-auto">
                                                                    Beach side
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <label class="cursor-pointer">
                                                            <div class="flex space-x-3">
                                                                <div class="my-auto flex">
                                                                    <input type="checkbox" name="" id="" class="form-input-checkbox">
                                                                </div>
                                                                <div class="my-auto">
                                                                    Has parking space
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <label class="cursor-pointer">
                                                            <div class="flex space-x-3">
                                                                <div class="my-auto flex">
                                                                    <input type="checkbox" name="" id="" class="form-input-checkbox">
                                                                </div>
                                                                <div class="my-auto">
                                                                    Pets allowed
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <label class="cursor-pointer">
                                                            <div class="flex space-x-3">
                                                                <div class="my-auto flex">
                                                                    <input type="checkbox" name="" id="" class="form-input-checkbox">
                                                                </div>
                                                                <div class="my-auto">
                                                                    Smoking allowed
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <label class="cursor-pointer">
                                                            <div class="flex space-x-3">
                                                                <div class="my-auto flex">
                                                                    <input type="checkbox" name="" id="" class="form-input-checkbox">
                                                                </div>
                                                                <div class="my-auto">
                                                                    Loud and/or Night parties allowed
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <div class="border-t mt-8 pt-6 flex space-x-4 justify-end">
                                        <a href="/account/homes" class="btn btn-transparent-black">
                                            Cancel
                                        </a>
                                        <button type="submit" class="btn btn-nin-orange">
                                            Add your place
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