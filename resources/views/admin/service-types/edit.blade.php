@extends('layouts.admin')


@section('title')
    Update Service Type: {{ $serviceType->name }}
@endsection


@section('css')
    <style>
        .admin-sidebar-service-types{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
@endsection

@section('content')
    <div class="container">

        <div class="page-title-account">
            <div>
               
                    Update Service Type: {{ $serviceType->name }}
                
            </div>
            <div class="pull-right flex space-x-4">
                <a href="{{route('admin.service-types.index')}}" class="btn btn-transparent-black">
                    <span class="fa fa-angle-left mr-2"></span>
                    Back
                </a>
            </div>
        </div>


        <div class="grid grid-cols-1 xl:grid-cols-1 gap-10">


            <div class="p-6 bg-white">
                <form method="POST" name="service-types" action="{{route('admin.service-types.update', $serviceType->id)}}">
                    @csrf
                    @method('put')
                    <div>

                        <p></p> 
                        
                        <div class="form-group">
                            <label>
                                Name
                                <span class="form-input-required">*</span>
                            </label>
                            <input type="text" name="name" value="{{ $serviceType->name ? $serviceType->name : old('name')}}" required  class="form-input" />
                        </div>

                        <div class="form-group">
                            <label>
                                Description
                                <span class="form-input-required">*</span>
                            </label>
                            <input type="text" name="description" value="{{ $serviceType->description ? $serviceType->description : old('description')}}" required  class="form-input" />
                        </div>

                        <button type="submit" class="btn btn-lg btn-block btn-nin-green mt-8">
                            Update
                        </button>
                        

                    </div>
                </form>
            </div>



        </div>

    </div>
@endsection
