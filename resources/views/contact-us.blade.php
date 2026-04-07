@extends('layouts.app')

@section('title')
    Contact Nigerian NIN UK
@endsection

@section('description')
    NIN UK - A Helpdesk to contact Nigerian NIN UK online platform where Nigerians in diaspora (mostly UK) can book appointment to have their NIN registration done.
@endsection

@section('content')
    <div>



        <div class="container py-16">

            <div class="lg:flex">

                <div class="w-full lg:w-1/2 xl:w-auto flex-grow lg:border-r border-gray-300 xl:mr-10 lg:pr-10">

                    <div class="font-extrabold text-2xl md:text-3xl xl:text-4xl leading-10">
                        Welcome to Helpdesk, Deacil Professional Services trading as NINUK

                    </div>
                    <div class="mt-3 max-w-lg">
                        Do you require assistance, have questions, or need clarifications? Kindly fill out the form and we will get back to you in earnest.
                    </div>

                    <div class="w-full h-full max-h-96 mt-10 bg-black rounded-lg overflow-hidden">
                        <img src={{asset('img/bgs/contact-us.jpeg')}} alt="vho" class="object-cover" />
                    </div>

                </div>


                <div class="mt-10 lg:mt-0 w-full lg:w-1/2 xl:w-96 flex-shrink-0 pl-0 lg:pl-10 xl:pl-0">

                    <form action="{{route('sendAdminMessage')}}" method="post" class="bg-white p-8 rounded-xl shadow-lg">
                        @csrf
                        <div class="grid grid-cols-2 gap-x-6">
                            <div class="form-group">
                                <label>
                                    Full Name
                                    <span class="form-input-required">*</span>
                                </label>
                                <input type="text" name="name" placeholder="eg: John Doe" class="form-input" value="{{old('name')}}"/>
                            </div>
                            <div class="form-group">
                                <label>
                                    Email Address
                                    <span class="form-input-required">*</span>
                                </label>
                                <input type="email" name="email" placeholder="email@example.com" class="form-input"  value="{{old('email')}}"/>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-x-6">
                            <div class="form-group">
                                <label>
                                    Phone Number
                                    <span class="form-input-required">*</span>
                                </label>
                                <input type="text" name="phone" placeholder="eg: +44 XX XXXX XXXX" class="form-input" value="{{old('phone')}}"/>
                            </div>

                            <div class="form-group">
                                <label>
                                    Select Location
                                    <span class="form-input-required">*</span>
                                </label>
                                <select name="location_id" class="form-input" id="selectLocation" required>
                                    <option value="" {{empty(old('location_id')) ? 'selected' : ''}} disabled>-Select Location -</option>
                                    @foreach ($locations as $location)
                                        <option value="{{$location->id}}" {{old('location_id') === $location->id ? 'selected' : ''}}>{{$location->location_name}}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>

                        <div class="form-group">
                            <label>
                                Subject
                                <span class="form-input-required">*</span>
                            </label>
                            <input type="text" name="subject" placeholder="eg: I want to ask about..." class="form-input" value="{{old('subject')}}" />
                        </div>


                        <div class="form-group">
                            <label>
                                Message
                                <span class="form-input-required">*</span>
                            </label>
                            <textarea name="message" id="message" cols="30" rows="10" class="form-input" style="width: 100%; height: 130px;  resize: vertical">{{old('message')}}</textarea>
                        </div>

                        <div class="mt-3 text-sm font-semibold text-gray-500">
                            <div class="captcha">
                                <div class="flex space-x-2">
                                    <span class="captchaImage">{!! captcha_img() !!}</span>
                                    <button type="button" class="reload btn bg-black text-white btn-md" id="reload">
                                        <span class="text-2xl relative -top-2">
                                            &#x21bb;
                                        </span>
                                    </button>
                                </div>
                                <div class="captcha span mt-2">
                                    <input id="captcha" type="text" class="form-input" placeholder="Enter Captcha" name="captcha">
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="btn btn-nin-green btn-block">
                                Send message
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>
        
    </div>

@endsection

@section('js')
    <script type="text/javascript">
        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function (data) {
                    $(".captcha .captchaImage").html(data.captcha);
                }
            });
        });
    </script>
@endsection
