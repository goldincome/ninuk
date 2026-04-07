@extends('layouts.admin')


@section('title')
    Edit Email Reminder Notification 
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
               
                Edit Email Reminder Notification 
                
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
                <form method="POST" name="duration" action="{{route('admin.reminder-setting.update', $reminderSetting->id)}}">
                    @csrf
                    @method('put')
                    <div>

                        <div class="font-bold">
                            Update how many days before user recieves appointment reminder email notification
                        </div><br/><br/>

                        <div class="form-group">
                            <label>
                                Number Of Days
                                <span class="form-input-required">*</span>
                            </label>
                            <select name="number_of_days" id="number_of_days" required class="form-input">
                                <option value="" disabled>-- select --</option>
                                <option value="1" {{ $reminderSetting->number_of_days == 1 ? 'selected' : ''}}>1</option>
                                <option value="2"{{ $reminderSetting->number_of_days == 2 ? 'selected' : ''}}>2</option>
                                <option value="3" {{ $reminderSetting->number_of_days == 3 ? 'selected' : ''}}>3</option>
                                <option value="4" {{ $reminderSetting->number_of_days == 4 ? 'selected' : ''}}>4</option>
                                <option value="5" {{ $reminderSetting->number_of_days == 5 ? 'selected' : ''}}>5</option>
                                <option value="6" {{ $reminderSetting->number_of_days == 6 ? 'selected' : ''}}>6</option>
                                <option value="7" {{ $reminderSetting->number_of_days == 7 ? 'selected' : ''}}>7</option>
                            </select>
                        </div>
                       
                       
                        <div class="form-group">
                            <label>
                                Status
                                <span class="form-input-required">*</span>
                            </label>
                            <select name="status" id="" class="form-input">
                                <option value="1" {{$reminderSetting->status ? 'selected' : ''}} >Active</option>
                                <option value="0" {{!$reminderSetting->status ? 'selected' : ''}} >Inactive</option>
                            </select>
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
