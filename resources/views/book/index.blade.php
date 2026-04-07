@extends('layouts.app')


@section('title')
    Booking
@endsection

@section('content')
    <div>



        <div id="book" class="relative">
            <div class="container">
                <div class="max-w-4xl md:flex md:space-x-10 py-10 relative z-20 mx-auto">

                    <div class="md:w-1/2 flex">
                        <div class="my-auto">
                            <div class="font-extrabold text-3xl md:text-4xl xl:text-5xl leading-10">
                                You are
                                <div class="h-1"></div>
                                few steps away.
                                <div class="h-1"></div>
                                Just fill this form
                                 <br/>
                                <div class="font-extrabold text-2xl md:text-2xl xl:text-2xl leading-10">
                                    From £75
                                </div>
                            </div>

                            <div class="hidden mt-6 md:leading-6 font-light opacity-70">
                                Are you a Nigerian living in the UK? You can now enroll for your NIN hassle-free at nin<span class="text-nin-orange">(uk)</span>.co.uk.
                                Just book an appointment with us, submit your information within minutes, and your NIN will be ready in few business days.
                            </div>
                            <div class="mt-6 flex space-x-2">
                                <a href="#requirements" class="btn btn-transparent-black btn-lg">
                                    Check Required Documents
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 md:mt-0 md:w-1/2">

                        <div class="bg-white p-8 rounded-xl shadow-lg">
                            @if($locations->count() <= 0)
                                <div class="alert alert-danger alert-dismissible" style="margin-bottom: 20px;">
                                    <br/><br/> We are on maintenance and will resume soon <br/><br/>
                                    <a href="{{route('contactUs')}}"> Click here to contact us</a>
                                    <br/><br/>
                                </div>
                            @else
                                {{-- @include('common.error-and-message') --}}
                                <form method="POST" name="settings" action="{{route('bookings.store')}}" class="submitBookingForm">

                                    @csrf

                                    <div class="tab-nav">
                                        <div class="tab-nav-header tab-nav-header-3-steps">
                                            <div class="active" onclick="tabNavGoto(1)">
                                                <div>
                                                    1
                                                </div>
                                            </div>
                                            <div onclick="tabNavGoto(2)">
                                                <div>
                                                    2
                                                </div>
                                            </div>
                                            <div onclick="tabNavGoto(3)">
                                                <div>
                                                    3
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-nav-body pt-6">

                                            <div class="tab-nav-body-1 active">

                                                <div class="form-group">
                                                    <label>
                                                        Full Name
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <input type="text" name="user_name" value="{{old('user_name')}}" placeholder="John Doe" class="form-input" required/>
                                                </div>

                                                <div class="form-group">
                                                    <label>
                                                        Email Address
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <input type="email" name="user_email" value="{{old('user_email')}}" placeholder="email@example.com" class="form-input" required/>
                                                </div>

                                                <div class="form-group">
                                                    <label>
                                                        Phone Number
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <input type="text" name="user_phone" value="{{old('user_phone')}}" placeholder="+44 XX XXXX XXXX" class="form-input" required/>
                                                </div>

                                                <button type="button" onclick="tabNavGoto(2)" class="btn btn-lg btn-block btn-nin-green mt-8 font-semibold">
                                                    Next
                                                    <span class="fa fa-angle-right ml-2"></span>
                                                </button>

                                            </div>

                                            <div class="tab-nav-body-2">

                                                <div class="form-group">
                                                    <label>
                                                    Select Location
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <select name="location_id" class="form-input" id="selectLocation" required>
                                                        <option value="" selected disabled>-- Select Location --</option>
                                                        @foreach ($locations as $location)
                                                            <option value="{{$location->id}}">{{$location->location_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group hidden" id="serviceTypeDiv">
                                                    <label>
                                                    Select Service Type
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <select name="our_service_id" class="form-input" id="our_service_id" required>
                                                        <option value="" selected disabled>-- Select Service Type --</option>
                                                        
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>
                                                        Appointment Date
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <input type="date" name="date"  class="form-input" value="{{old('date')}}" id="appointmentDate" min='<?php echo date("Y-m-d");?>'/>
                                                </div>

                                                <div class="form-group">
                                                    <label>
                                                        Appointment Time
                                                        <span class="form-input-required">*</span>
                                                        <p class="form-input-required hidden" id="invalidSelectedDate"></p>
                                                    </label>
                                                    <select name="time" class="form-input" id="appointmentTime">
                                                        <option value="">-- Select Time --</option>
                                                    </select>
                                                </div>

                                                <div class="flex space-x-4 justify-between mt-8">
                                                    <button type="button" onclick="tabNavGoto(1)" class="btn btn-lg btn-block btn-transparent-black">
                                                        <span class="fa fa-angle-left mr-2"></span>
                                                        Prev
                                                    </button>
                                                    <button type="button" onclick="tabNavGoto(3)" class="btn btn-lg btn-block btn-nin-green font-semibold">
                                                        Next
                                                        <span class="fa fa-angle-right ml-2"></span>
                                                    </button>
                                                </div>

                                            </div>

                                            <div class="tab-nav-body-3">
                                                
                                                @foreach ($serviceTypes as $serviceType)
                                                    @if (View::exists('common.our-services.'.$serviceType->slug)) 
                                                        <div id="{{ $serviceType->slug }}" class="hidden">
                                                            @include('common.our-services.'.$serviceType->slug ?? '')
                                                        </div>
                                                    @endif
                                                @endforeach
                                               
                                                
                                                <span style="color: brown;"><b>We only accept Cash/Card Payment during capture/application.</b></span>
                                                <div class="flex space-x-4 justify-between mt-4">
                                                   
                                                    <button type="button" onclick="tabNavGoto(2)" class="btn btn-lg btn-block btn-transparent-black">
                                                        <span class="fa fa-angle-left mr-2"></span>
                                                        Prev
                                                    </button>
                                                    <button type="submit" class="btn btn-lg btn-block btn-nin-green font-semibold">
                                                        Submit
                                                        <span class="fa fa-check ml-2"></span>
                                                    </button>
                                                </div>

                                            </div>

                                        </div>
                                    </div>




                                </form>
                            @endif
                        </div>

                    </div>

                </div>
            </div>

            <div class="w-full h-full opacity-40 img-bg3 absolute inset-0 z-10"></div>
        </div>





        @include('common.requirements')





        <div class="relative bg-nin-green">
            <div class="relative z-10 container">
                <div class="py-20 sm:py-32 px-6 md:px-12 max-w-5xl flex items-center text-center flex-col mx-auto text-white">
                    <div class="text-3xl md:text-4xl xl:text-5xl font-semibold font-recoleta">
                        Need help with your booking?
                    </div>
                    <div class="mt-5">
                        Are you experiencing any difficulty with placing your appointment booking?
                        We can help you book a time & date convenient for you. Click the button below to contact us.
                    </div>
                    <div class="flex space-x-4 mt-5">
                        <a href="/contact" class="btn text-black bg-white btn-lg shadow-lg">
                            Send us a message
                        </a>
                    </div>
                </div>
            </div>
            <div class="bg-img-under bg-wavy"></div>
        </div>





    </div>
@endsection

@section('js')
    <script>
        function toggleRequirements(id){
            $(".hte-div").addClass("hidden");
            $("#"+id).removeClass("hidden");

            $(".hte-indicator").addClass("invisible");
            $("."+id).children().eq(0).removeClass("invisible");
        }

        $(document).ready(() => {

            selectCardType = () => {
                const allOptions = $('input[name="card_type"]');
                const selectedOptions = $('input[name="card_type"]:checked');
                const selectedOptionsVal = selectedOptions.val();

                if (selectedOptionsVal !== undefined){
                    $(".card-mini-text").addClass("hidden");
                }

                if (selectedOptionsVal === "PVC"){
                    $(".card-type-paper").addClass("hidden");
                    $(".card-type-pvc").removeClass("hidden");
                }
                else if (selectedOptionsVal === "Print Out"){
                    $(".card-type-pvc").addClass("hidden");
                    $(".card-type-paper").removeClass("hidden");
                }

                allOptions.parent().css({"border-color":"#ddd"});
                selectedOptions.parent().css({"border-color":"#0fc55e"});

                allOptions.siblings(".fa-check-circle").addClass("invisible");
                selectedOptions.siblings(".fa-check-circle").removeClass("invisible");
            }
            selectCardType();



            function validateBookingForm(index){
                const form = $(".tab-nav-body > div").eq(index - 1);
                let errors = 0;

                form.find("input, select, textarea").each(function(){
                    $(this).removeClass("error");
                    if (($(this).val() === "") || ($(this).val() === null) || ($(this).val() === "-- Select Time --")){
                        $(this).addClass("error");
                        errors++;
                    }
                });

                if (errors === 0){
                    return true;
                }
                else{
                    toastr.error("Please fill all inputs");
                    return false;
                }
            }

            function validateSubmitBookingForm(){
                if ($("input[name='card_type']:checked").val() === "PVC"){
                    let errors = 0;
                    //$(".card-type-pvc").find("input, select, textarea").each(function(){
                    //    $(this).removeClass("error");
                    //    if (($(this).val() === "") || ($(this).val() === null) || ($(this).val() === "-- Select Time --")){
                    //       $(this).addClass("error");
                    //        errors++;
                    //    }
                    //});

                    //postal_code = $("#postal_code").val();
                    //if (postal_code === "" || postal_code === null){
                   //     $("#postal_code").addClass("error");
                    //     errors++;
                   // }
                   // delivery_address = $("#delivery_address").val();
                   // if (delivery_address === "" || delivery_address === null){
                   //     $("#delivery_address").addClass("error");
                    //     errors++;
                    //}

                    if (errors === 0){
                        return true;
                    }
                    else{
                        toastr.error("Please fill all inputs");
                        return false;
                    }
                }
                else if ($("input[name='card_type']:checked").val() === "Print Out"){
                    return true;
                }
                else{
                    toastr.error("Please select a type");
                    return false;
                }
            }

            tabNavGoto = (index) => {
                const selectedTab = index - 1;
                const activeTab = $(".tab-nav-header > div.active").index();

                if (
                    (selectedTab > activeTab && validateBookingForm(selectedTab) === true) ||
                    (selectedTab < activeTab)
                ){
                    $(".tab-nav-header > div").removeClass("active");
                    $(".tab-nav-header").children().eq(selectedTab).addClass("active");
                    $(".tab-nav-body > div").removeClass("active");
                    $(".tab-nav-body").children().eq(selectedTab).addClass("active");
                }
            }

            $(".submitBookingForm").submit(function(e){
                if (validateSubmitBookingForm() === false){
                    e.preventDefault();
                }
                if ($("input[name='card_type']:checked").val() === "PVC"){
                    $('[name=postal_code]').val($("#postal_code").val());
                    $('[name=delivery_address]').val($("#delivery_address").val());
                    //alert($("#postal_code").val());
                }
            });



        });
    </script>

    <script>
        $(function() {
            $("#selectLocation").change(function(e) {
                $('#appointmentTime')
                .empty()
                .append($("<option />").text('-- Select Time --'));

                $("#appointmentDate").val('');
                $("#serviceTypeDiv").hide();

                let location_id = $('#selectLocation').val();
                $.ajax({
                    type: "POST",
                    url: '/bookings/getAvailableService',
                    data: {location_id},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        let availableTime = data['availableTime'];
                       
                        if(data['status'] == false){
                            toastr.error(data['error_message']);
                            $("#invalidSelectedDate").text(data['error_message']);
                            $("#invalidSelectedDate").show();
                        }else{
                            $("#serviceTypeDiv").show();
                            
                            $('#our_service_id').empty();
                            $('#our_service_id').show();
                            $('#our_service_id').append('<option value=""> --Select Service Type-- </option>');
                            $.each(data.service_type, function(key, value){
                                $('#our_service_id').append('<option value="'+value.id+'">' + value.name + '</option>');

                            });
                        }
                    },
                    error: function (data) {

                    }
                });

            });


            $("#our_service_id").change(function(e) {
                let service_id = $('#our_service_id').val();
                $.ajax({
                    type: "POST",
                    url: '/bookings/getSingleService',
                    data: {service_id},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        if(data['status'] == false){
                            toastr.error(data['error_message']);
                            
                        }else{
                            slug = data.slug;
                            $('#'+slug).show();
                            //alert(slug);
                            $.each(data.service_type, function(key, value){
                                if(slug != value.slug){
                                    $('#'+value.slug).hide();
                                }
                            });
                          
                           
                            //else{
                                $('.'+slug+'CardPriceTotal').text(data.our_service.price + data.our_service.pvc_print_delivery_cost)
                                $('.'+slug+'CapturePriceOnly').text(data.our_service.price)
                                $('.'+slug+'CardPriceOnly').text(data.our_service.pvc_print_delivery_cost)
                           // }
                        }
                    },
                    error: function (data) {

                    }
                });
            });


            $("#appointmentDate").change(function(e) {
                e.preventDefault();
                let location_id = $('#selectLocation').val();
                let date = $(this).val();
                var t = new Date();
                var s = new Date(date);
                let today = t.getDate()+"-"+(t.getMonth() + 1)+"-"+t.getFullYear();
                let selectedDate = s.getDate()+"-"+(s.getMonth() + 1)+"-"+s.getFullYear();
                let $dropdown = $("#appointmentTime");
                $dropdown.empty();
                $dropdown.append($("<option />").text('-- Select Time --'));
                $.ajax({
                    type: "POST",
                    url: '/bookings/getAvailableTimeSlot',
                    data: {date, location_id},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        let availableTime = data['availableTime'];
                        if(data['status'] == false){
                            toastr.error(data['error_message']);
                            $("#invalidSelectedDate").text(data['error_message']);
                            $("#invalidSelectedDate").show();
                        }else{
                            $("#invalidSelectedDate").hide();
                            for (i = 0; i < availableTime.length; ++i) {
                                var selectedTime = new Date(data['meta']+" " + availableTime[i]['time']);
                                $dropdown.append($("<option />")
                                .attr("disabled", (availableTime[i]['status' ] == false || (today == selectedDate && t.getTime() > selectedTime.getTime())))
                                .val(availableTime[i]['time'])
                                .text(availableTime[i]['time']));
                            }
                           // $('.ninCardPriceTotal').text(data.setting.nin_capture_price + data.setting.pvc_print_delivery_cost)
                            //$('.ninCapturePriceOnly').text(data.setting.nin_capture_price)
                            //$('.ninCardPriceOnly').text(data.setting.pvc_print_delivery_cost)
                        }
                    },
                    error: function (data) {

                    }
                });
            });
        });
    </script>
@endsection
