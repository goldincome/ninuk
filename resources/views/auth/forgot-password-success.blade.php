@extends('layouts.auth')


@section('title')
    Create New Account
@endsection


@section('content')

    <div class="w-full max-w-xl p-8 sm:p-14 mx-auto md:my-auto">
        <div class="pb-14 md:pt-20 lg:pl-4 lg:pr-4">

            <div class="mt-8 mx-auto lg:mx-0 text-center max-w-md">
                <div class="h-48 sm:h-56">
                    <img src="{{asset('img/icons/confirm-mail.png')}}" alt="logo" class="h-full object-contain mx-auto" />
                </div>
                <div class="mt-0 font-boing font-semibold text-2xl sm:text-3xl">
                    Password reset link sent
                </div>
                <div class="mt-4 text-gray-500">
                    We have sent a password reset link to your email address
                    <span class="text-gray-900">email@example.com</span>.
                    <br />
                    Please click the link in the mail to reset your account password.
                </div>

                <a href="/login" class="btn btn-lg btn-block btn-nin-green mt-8">Back to Login</a>

            </div>

        </div>
    </div>


@endsection