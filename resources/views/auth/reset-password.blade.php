@extends('layouts.auth')


@section('title')
    Login
@endsection


@section('content')
    <div class="w-full max-w-xl p-8 sm:p-14 mx-auto md:my-auto">
        <div class="pb-14 md:pt-20 lg:pl-4 lg:pr-4">
            
            <div class="font-boing font-semibold text-2xl sm:text-3xl text-center md:text-left">
                Reset password
            </div>

            <div>
                <form method="get" action="/reset-password/success">

                    <div class="mt-10 w-full max-w-md mx-auto md:mx-0 lg:w-96">
                        
                        <div class="form-group">
                            <label>
                                Email Address
                                <span class="form-input-required">*</span>
                            </label>
                            <input type="email" name="email" value="email@example.com" class="form-input bg-gray-300" readonly />
                        </div>

                        <div class="form-group">
                            <label>
                                Password
                                <span class="form-input-required">*</span>
                            </label>
                            <input type="password" name="password" placeholder="XXXXXXXX" class="form-input" />
                        </div>

                        <div class="form-group">
                            <label>
                                Retype Password
                                <span class="form-input-required">*</span>
                            </label>
                            <input type="password" name="retype_password" placeholder="XXXXXXXX" class="form-input" />
                        </div>

                        <button type="submit" class="btn btn-lg btn-block btn-nin-green mt-8">
                            Reset Password
                        </button>

                        <div class="mt-3 text-sm font-semibold text-gray-500">
                            Already reset your password?
                            <a href="/login" class="text-nin-green hover:underline">Login</a>
                        </div>

                    </div>
                    
                </form>
            </div>

        </div>
    </div>
@endsection