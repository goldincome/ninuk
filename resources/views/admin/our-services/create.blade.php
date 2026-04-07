@extends('layouts.admin')


@section('title')
    Add New Services
@endsection


@section('css')
    <style>
        .admin-sidebar-our-services{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
@endsection

@section('content')
    <div class="container">

        <div class="page-title-account">
            <div>
               
                   Add New Srvices
                
            </div>
            <div class="pull-right flex space-x-4">
                <a href="{{route('admin.closed-durations.index')}}" class="btn btn-transparent-black">
                    <span class="fa fa-angle-left mr-2"></span>
                    Back
                </a>
            </div>
        </div>


        <div class="grid grid-cols-1 xl:grid-cols-1 gap-10">


            <div class="p-6 bg-white">
                <form method="POST" name="duration" action="{{route('admin.closed-durations.store')}}">
                    @csrf
                    <div>

                        <div class="font-bold">
                            Block dates and time for appointment bookings
                        </div><p></p>
                        
                        <div class="form-group">
                            <label>
                                Title
                                <span class="form-input-required">*</span>
                            </label>
                            <input type="text" name="title" value="{{ old('title') }}" required  class="form-input" />
                        </div>

                        <div class="form-group">
                            <label>
                                Date From
                                <span class="form-input-required">*</span>
                            </label>
                            <input type="date" name="date_from" value="{{ old('date_from') }}" required  class="form-input" />
                        </div>
                        
                        <div class="form-group">
                            <label>
                                Date To
                                <span class="form-input-required">*</span>
                            </label>
                            <input type="date" name="date_to" value="{{ old('date_to') }}" required  class="form-input" />
                        </div>
                        
                        <div class="form-group">
                            <label>
                                Location
                                <span class="form-input-required">*</span>
                            </label>
                            <select name="location_id" id="location_id" required class="form-input">
                                <option value="">-- select --</option>
                                @foreach ($locations as $location )
                                    <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                                @endforeach
                                
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



                            <button type="submit" class="btn btn-lg btn-block btn-nin-green mt-8">
                                Create
                            </button>
                        

                    </div>
                </form>
            </div>



        </div>

    </div>
@endsection
