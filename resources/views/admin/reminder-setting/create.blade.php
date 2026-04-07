@extends('layouts.admin')


@section('title')
 New Email Reminder Notification Settings
@endsection


@section('css')
    <style>
        .admin-sidebar-reminder-settings{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
@endsection

@section('content')
    <div class="container">

        <div class="page-title-account">
            <div>
               
                New Email Reminder Notification
                
            </div>
            <div class="pull-right flex space-x-4">
                <a href="{{route('admin.reminder-setting.index')}}" class="btn btn-transparent-black">
                    <span class="fa fa-angle-left mr-2"></span>
                    Back
                </a>
            </div>
        </div>


        <div class="grid grid-cols-1 xl:grid-cols-1 gap-10">


            <div class="p-6 bg-white">
                <form method="POST" name="duration" action="{{route('admin.reminder-setting.store')}}">
                    @csrf
                    <div>

                        <div class="font-bold">
                            Set how many days before user recieves appointment reminder email notification
                        </div><br/><br/>
                        
                        <div class="form-group">
                            <label>
                                Number Of Days
                                <span class="form-input-required">*</span>
                            </label>
                            <select name="number_of_days" id="number_of_days" required class="form-input">
                                <option value="" disabled>-- select --</option>
                                <option value="1" {{ old('number_of_days') == 1 ? 'selected' : ''}}>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                        </div>
                       
                       
                        <div class="form-group">
                            <label>
                                Status
                                <span class="form-input-required">*</span>
                            </label>
                            <select name="status" id="" class="form-input">
                                <option value="1" {{ old('status') == 1 ? 'selected' : ''}}>Active</option>
                                <option value="0" {{ old('status') == 0 ? 'selected' : ''}}>Inactive</option>
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
