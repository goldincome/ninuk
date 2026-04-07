@extends('layouts.auth')


@section('title')
    Create New Account
@endsection


@section('content')

    <div class="w-full max-w-xl p-8 sm:p-14 mx-auto md:my-auto">
        <div class="pb-14 md:pt-20 lg:pl-4 lg:pr-4">




            {{-- SUCCESS --}}
            <div class="mt-8 mx-auto lg:mx-0 text-center max-w-md">
                <div class="h-40">
                    <span class="fa fa-check-circle text-9xl text-green-500"></span>
                </div>
                <div class="mt-0 font-boing font-semibold text-2xl sm:text-3xl">
                    Password reset successful
                </div>
                <div class="mt-4 text-gray-500">
                    Your password has been reset successfully.
                    You can now login to access your account.
                </div>
                <a href="/login" class="btn btn-lg btn-block btn-nin-green mt-8">Back to Login</a>
            </div>




            {{-- ERROR --}}
            {{-- 
            <div class="mt-8 mx-auto lg:mx-0 text-center max-w-md">
                <div class="h-40">
                    <span class="fa fa-times-circle text-9xl text-red-500"></span>
                </div>
                <div class="mt-0 font-boing font-semibold text-2xl sm:text-3xl">
                    Password reset failed
                </div>
                <div class="mt-4 text-gray-500">
                    Sorry, your password could not be reset.
                    Click the button below to resend a password reset link.
                </div>
                <button type="submit" class="btn btn-lg btn-block btn-nin-green mt-8">Resend password reset link</button>
                <a href="/login" class="btn btn-lg btn-block btn-transparent-black mt-2">Back to Login</a>
            </div>
            --}}




        </div>
    </div>

@endsection