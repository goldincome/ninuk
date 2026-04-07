@extends('layouts.app')


@section('title')
    Get Cheap Flight Ticket to Nigeria From UK - NINUK
@endsection

@section('description')
✈️ Looking for a cheap flight ticket from UK to Nigeria? Get the best deals on flights to Lagos, Abuja, and more. Book now and save on your next trip! 🌍💰
@endsection

@section('css')
    <style>
        .radio-group {
            display: flex;
            gap: 1rem;
            margin-top: 0.5rem;
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-input[type="radio"] {
            width: 1rem;
            height: 1rem;
        }
    </style>
@endsection

@section('content')
    <div>
        @include('common.page-navlink')
        <div id="book" class="relative">
            <div class="container">
                <div class="max-w-4xl md:flex md:space-x-10 py-10 relative z-20 mx-auto">

                    <div class="md:w-1/2 flex">
                        <div class="my-auto">
                            <div class="font-bold text-3xl md:text-4xl xl:text-5xl leading-10">
                                You are
                                <div class="h-1"></div>
                                few steps away to getting Cheap Flight Ticket To Nigeria.
                                <div class="h-3 text-xl md:text-2xl xl:text-3xl ">Just fill this form</div>
                            </div>


                            <div class=" mt-6 md:leading-6 font-light opacity-60">
                                Are you a Nigerian living in the UK looking for cheap and reliable flight to Nigeria? 
                                You can now get the best and reliable cheap flight to Nigeria.
                                Just fill this form and get the best flight fare  to Nigeria Now!.
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
                                @include('includes.flash-messages') 
                                <form method="POST" name="settings" action="{{route('processflightTicket')}}" class="submitBookingForm">

                                    @csrf
                                    <div class="text-center text-xl">Cheap Flight To Nigeria </div>
                                    <div class="tab-nav">                                        <div class="tab-nav-header tab-nav-header-3-steps">
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
                                                        Trip Type
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <div class="radio-group">
                                                        <div class="radio-option">
                                                            <label for="trip_type_return">Return</label>
                                                            <input type="radio" name="trip_type" id="trip_type_return" value="return" class="form-input" 
                                                                   {{ old('trip_type') === 'return' ? 'checked' : '' }} required/>
                                                        </div>
                                                        <div class="radio-option">
                                                            <label for="trip_type_one_way">One Way</label>
                                                            <input type="radio" name="trip_type" id="trip_type_one_way" value="One Way" class="form-input"
                                                                   {{ old('trip_type') === 'One Way' ? 'checked' : '' }} />
                                                        </div>
                                                        <div class="radio-option">
                                                            <label for="trip_type_multi_city">MultiCity</label>
                                                            <input type="radio" name="trip_type" id="trip_type_multi_city" value="Multi City" class="form-input"
                                                                   {{ old('trip_type') === 'Multi City' ? 'checked' : '' }} />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="trip_method" >
                                                    
                                                    <div class="space-y-2">
                                                      <div class="flex items-center" id="flexi">
                                                        <input
                                                          type="checkbox"
                                                          name="trip_method_flexi"
                                                          id="trip_method_flexi"
                                                          value="Flexi"
                                                          class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out"
                                                          {{ old('trip_method') === 'Flexi' ? 'checked' : '' }}
                                                        />
                                                        <label for="trip_type_return" class="ml-2 text-sm text-gray-700">
                                                            Flexi (+/- 3 days)
                                                        </label>
                                                      </div>
                                                      
                                                      <div class="flex items-center" id="direct">
                                                        <input
                                                          type="checkbox"
                                                          name="trip_method_direct"
                                                          id="trip_method_direct"
                                                          value="Direct"
                                                          class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out"
                                                          {{ old('trip_method') === 'Direct' ? 'checked' : '' }}
                                                        />
                                                        <label for="trip_type_multi_city" class="ml-2 text-sm text-gray-700">
                                                          Direct
                                                        </label>
                                                      </div>
                                                    </div>
                                                </div>
                                                  
                                                <div class="form-group">
                                                    <label>
                                                    Flying From
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <select name="flying_from" class="form-input" id="flying_from" required>
                                                        <option value="" selected disabled>-- Select Location --</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                    Flying To
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <select name="flying_to" class="form-input" id="flying_to" required>
                                                        <option value="" selected disabled>-- Select Destination --</option>
                                                        <option value="Nigeria">Nigeria</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="departDiv">
                                                    <label>
                                                        Depart Date
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <input type="date" name="depart_date"  class="form-input" value="{{old('depart_date')}}" id="departDate" min='<?php echo date("Y-m-d");?>'/>
                                                </div>
                                                <div class="form-group" id="returnDiv">
                                                    <label>
                                                        Return Date
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <input type="date" name="return_date"  class="form-input" value="{{old('return_date')}}" id="returnDate" min='<?php echo date("Y-m-d");?>'/>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                    Adult(>15)
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <select name="num_of_adult" class="form-input" id="num_of_adult" required>
                                                        <option value="" selected disabled>-- Select No of Adult --</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
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

                                                <div class="form-group">
                                                    <label>
                                                    Youth(12 - 15)
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <select name="num_of_youth" class="form-input" id="num_of_youth">
                                                        <option value="" selected disabled>-- Select No of Youth --</option>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>

                                               <div class="form-group">
                                                    <label>
                                                    Children(2 - 11)
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <select name="num_of_children" class="form-input" id="num_of_children">
                                                        <option value="" selected disabled>-- Select No of Children --</option>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                    Infant(< 2)
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <select name="num_of_infant" class="form-input" id="num_of_infant">
                                                        <option value="" selected disabled>-- Select No of Infant --</option>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                    Travel Class
                                                        <span class="form-input-required">*</span>
                                                    </label>
                                                    <select name="travel_class" class="form-input" id="travel_class" required>
                                                        <option value="" selected disabled>-- Select No of Travel Class --</option>
                                                        <option value="Economy Class">Economy Class</option>
                                                        <option value="Economy Premium">Economy Premium</option>
                                                        <option value="Business Class">Business Class</option>
                                                        <option value="First Class">First Class</option>
                                                        <option value="No Preference">No Preference</option>
                                                    </select>
                                                </div>
                                                
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




        <div>
            @include('common.wavy')
            <div class="transform rotate-180">
                @include('common.wavy')
            </div>
        </div>


        <div id="how" class="py-20 relative">
            <div class="relative z-10 container">
                <div>

                    <div class="mb-16">
                        <div class="font-extrabold text-3xl md:text-4xl xl:text-5xl leading-10">
                            How it works
                        </div>
                        <div class="mt-2 text-lg">
                            The process of getting Cheap Flight Ticket to Nigerian is seamless. It goes through the steps highlighted below
                        </div>
                    </div>

                    <div class="mx-auto overflow-hidden grid sm:grid-cols-2 md:grid-cols-3 gap-4 xl:gap-8">

                        <div class="h-full block p-8 xl:p-14 rounded-xl shadow-sm bg-white">
                            <div>
                                <span class="fa fa-calendar text-6xl text-nin-green"></span>
                            </div>
                            <div class="mt-6">
                                <div class="text-xl lg:text-3xl font-semibold">
                                    Fill Information
                                </div>
                                <div class="mt-2 sm:mt-4 font-light">
                                    Just fill out the form above with your trip information and departure date.<br/>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="h-full block p-8 xl:p-14 rounded-xl shadow-sm text-white bg-nin-green">
                            <div>
                                <span class="fa fa-desktop text-6xl text-white"></span>
                            </div>
                            <div class="mt-6">
                                <div class="text-xl lg:text-3xl font-semibold">
                                    Get best and cheap Flight fares 
                                </div>
                                <div class="mt-2 sm:mt-4 font-light">
                                    We will send you the list of best and cheap flight fares matching your destination information.
                                </div>
                            </div>
                        </div>

                        <div class="h-full block p-8 xl:p-14 rounded-xl shadow-sm bg-white">
                            <div>
                                <span class="fa fa-file text-6xl text-nin-green"></span>
                            </div>
                            <div class="mt-6">
                                <div class="text-xl lg:text-3xl font-semibold">
                                    Pay and get your ticket
                                </div>
                                <div class="mt-2 sm:mt-4 font-light">
                                    Make a payment and get your flight ticket. Enjoy your flight.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="bg-img-under bg-spiral-under"></div>
        </div>

        


        <div class="relative bg-nin-green">
            <div class="relative z-10 container">
                <div class="py-20 sm:py-32 px-6 md:px-12 max-w-5xl flex items-center text-center flex-col mx-auto text-white">
                    <div class="text-3xl md:text-4xl xl:text-5xl font-semibold font-recoleta">
                        Need help getting your flight ticket?
                    </div>
                    <div class="mt-5">
                        Are you experiencing any difficulty getting your flight ticket?</br>
                        We can help you to get the best fare.</br>
                        Click the button below to contact us.
                    </div>
                    <div class="flex space-x-4 mt-5">
                        <a href="{{ route('contactUs') }}" class="btn text-black bg-white btn-lg shadow-lg">
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
                if ($("input[name='trip_type']:checked").val() === "return"){
                    let errors = 0;

                    if (errors === 0){
                        return true;
                    }
                    else{
                        toastr.error("Please fill all inputs");
                        return false;
                    }
                }
                else if ($("input[name='trip_type']:checked").val() === "one_way"){
                    return true;
                }
                else{
                    toastr.error("Please select a Trip type");
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
                
            });



        });
    </script>

    <script>
        $(function() {
            $("#trip_type_one_way").click(function(e) {
                document.getElementById('returnDate').valueAsDate = new Date();
                $("#returnDiv").hide();
                $("#flexi").hide();
            });

            $("#trip_type_return").click(function(e) {
                $("#returnDiv").show();
                $("#flexi").show();
            });

            $("#trip_type_multi_city").click(function(e) {
                $("#returnDiv").hide();
                $("#flexi").hide();
            });

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
