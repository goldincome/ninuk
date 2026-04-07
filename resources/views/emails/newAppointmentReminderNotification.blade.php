<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://i.ibb.co/fQc228F/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster:wght@400;700&display=swap" rel="stylesheet">

    <title>Appointment Reminder Notification - NIN UK</title>
    <style type="text/css">
        body {
            Margin: 0;
            padding: 0;
            color: #000000;
            background-color: #eeeeee;
            font-size: 15px;
            font-family: "Montserrat", sans-serif;
            line-height: 25px;
        }

        a {
            color: #0fc55e;
        }

        table {
            border-spacing: 0;
        }

        td {
            padding: 0;
        }

        img {
            border: 0;
        }

        .content-outer {
            padding: 20px;
        }

        .content {
            background: #ffffff;
            margin: auto;
            max-width: 600px;
        }

        .header {
            height: 100px;
            text-align: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-color: #0fc55e;
            display: flex;
        }

        .header-title {
            margin: auto;
            color: #fff;
            font-size: 50px;
            font-weight: bold;
            font-family: 'Lobster', cursive;
        }

        .body {
            padding: 30px 20px;
        }

        .divider {
            margin: 30px 0;
            height: 2px;
            /* background-color: #CEB23C; */
            background-color: #eee;
        }

        .btn {
            width: max-content;
            padding: 8px 24px;
            font-weight: bold;
            display: flex;
            color: #fff;
            text-decoration: none;
            background-color: #0fc55e;
            border-radius: 4px;
            align-items: center;
            justify-content: center;
        }

        .btn-lg {
            padding: 12px 32px;
        }

        .footer {
            padding: 30px 20px;
            font-size: 12px;
            background-color: #f8f8f8;
        }

        .footer-bottom {
            height: 20px;
            text-align: center;
            background-color: #0fc55e;
        }
    </style>
</head>

<body>

    <div class="content-outer">
        <div class="content">
            <div class="header">
                <div class="header-title">
                    nin<span style="color: #ffd700">uk</span>.co.uk
                </div>
            </div>
            <div class="body">

                <div>
                    Hello {{$appointment->user_name}} ,
                </div>

                <div style="margin-top: 20px;">
                    This is a reminder notification that you have {{$days }} day(s) to come for your appointment booked for <br/>
                    Date: {{$appointment->date->format("M d, Y h:i A")}} <br/>
                    Time: {{$appointment->start_time}} <br/><br/>
                    @if($appointment->status === \App\Models\Appointment::TOPAYONCAPTURE)
                        @if($appointment->serviceType->slug === $appointment->serviceType::BVN || 
                            $appointment->serviceType->slug === $appointment->serviceType::BVN_PERSONAL_BANK_ACCOUNT
                            || $appointment->serviceType->slug === $appointment->serviceType::BVN_CORPORATE_BANK_ACCOUNT)
                            Your are to pay when you come for capture. </br>
                            Remember to come with your reference number <b>#{{$appointment->ref}}</b>
                            and bring along any of the document below:</br>
                            - <b>Nigerian international passport </b> </br>
                            - <b>Nigerian NIN Verification Slip</b> </br>
                            An email will be sent shortly, to confirm your appointment booking.</br> 
                            Come with the email for your BVN capture </br>
                        @elseif($appointment->serviceType->slug === $appointment->serviceType::BANK_ACCOUNT || 
                            $appointment->serviceType->slug === $appointment->serviceType::BVN_PERSONAL_BANK_ACCOUNT 
                            || $appointment->serviceType->slug === $appointment->serviceType::BVN_CORPORATE_BANK_ACCOUNT)
                            Your are to pay when you come to fill your bank account opening form. </br>
                            Remember to come with your reference number <b>#{{$appointment->ref}}</b>
                            and bring along all of the documents below:</br>
                            - <b>Your BVN No </b> </br>
                            - <b>Nigerian NIN Verification Slip</b> </br>
                            An email will be sent shortly, to confirm your appointment booking.</br> 
                            Come with the email for your Bank account opening.

                        @elseif($appointment->serviceType->slug === $appointment->serviceType::PASSPORT_5_YEARS || 
                            $appointment->serviceType->slug === $appointment->serviceType::PASSPORT_10_YEARS )
                                Your are to pay when you come to fill your Passport application form. </br>
                                Remember to come with your reference number <b>#{{$appointment->ref}}</b>
                                and bring along all of the documents below:</br>
                                - <b>Nigerian international Passport Data Page </b> </br>
                                - <b>Nigerian NIN Verification Slip</b> </br>
                                - <b>Passport photo</b> </br>
                                - <b>Current Signature</b> </br>
                                An email will be sent shortly, to confirm your appointment booking.</br> 
                                Come with the email for your Passport Appplication.
                        @else
                            Your are to pay when you come for capture. Remember to come with your reference number <b>#{{$appointment->ref}}</b>
                            and bring along your <b>BVN No</b> if you have one.<br/>
                            Come with this email for your NIN capture and also come on the date and time that you booked below.<br/>
                            Bring along verification documents (preferably the Nigerian passport).<br/>
 
                        @endif
                    @else
                        Please, come on the date and time that you booked below for your NIN capture.
                        Your payment was successful and your appointment with reference number <b>#{{$appointment->ref}}</b> has been booked.
                        
                    @endif
                    <br/>
                    =======================================================
                    <br/>Note: Please, remember to wear white or bright top and if your children are the ones capturing, it is mandatory for children to wear white or bright top.<br/>
                    =============================================================
                    <br/><b>We only accept Cash/Card Payment during capture/application.</b><br/>
                    <!-- Please make payment using the button below to complete this booking. -->
                    <!-- <div style="margin-top: 10px;">
                        <a href="https://ninuk.co.uk/book/preview/12345" class="btn btn-lg">
                            Make Payment
                        </a>
                    </div> -->
                    <br/><br/>
                    Full details of this appointment is listed below.
                </div>

                <div class="divider"></div>

                <div style="margin-top: 10px;">

                    <div style="margin-bottom: 15px;">
                        <span style="font-weight: bold;">
                            Name :
                        </span>
                        <span>
                            {{$appointment->user_name}}
                        </span>
                    </div>
                    <!-- <div style="margin-bottom: 15px;">
                        <span style="font-weight: bold;">
                            Last Name :
                        </span>
                        <span>
                            Lawal
                        </span>
                    </div> -->
                    <div style="margin-bottom: 15px;">
                        <span style="font-weight: bold;">
                            Booking Reference No:
                        </span>
                        <span>
                            {{$appointment->ref}}
                        </span>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <span style="font-weight: bold;">
                            Service Type:
                        </span>
                        <span>
                            {{$appointment->serviceType->name}}
                        </span>
                    </div>
                    
                    <div style="margin-bottom: 15px;">
                        <span style="font-weight: bold;">
                            Email Address :
                        </span>
                        <span>
                            {{$appointment->user_email}}
                        </span>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <span style="font-weight: bold;">
                            Phone Number :
                        </span>
                        <span>
                            {{$appointment->user_phone}}
                        </span>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <span style="font-weight: bold;">
                            Appointment Date :
                        </span>
                        <span>
                            {{$appointment->date->format("M d, Y h:i A")}}
                        </span>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <span style="font-weight: bold;">
                            Appointment Time :
                        </span>
                        <span>
                            {{$appointment->start_time}}
                        </span>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <span style="font-weight: bold;">
                            Appointment Duration :
                        </span>
                        <span>
                            {{$appointment->appointmentDurationInMinutes}} mins
                        </span>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <span style="font-weight: bold;">
                            Venue Address for your capture/application :<br/>
                        </span>
                        <span>
                            {{$appointment->location->location_name}}, <br/>
                            {{$appointment->location->location_address}} <br/>
                            Call: {{$appointment->location->contact_phone}}<br/>
                            Email: {{$appointment->location->contact_email}}
                        </span>
                    </div>
                    @if($appointment->serviceType->slug === $appointment->serviceType::PASSPORT_5_YEARS || 
                        $appointment->serviceType->slug === $appointment->serviceType::PASSPORT_10_YEARS )
                        <div style="margin-bottom: 15px;">
                            <span style="font-weight: bold;">
                                Charges Apply<br/>
                            </span>
                            <span>
                                Application charges apply
                            </span>
                        </div>
                    @else 
                        @if($appointment->card_type === $appointment::CARD_TYPE_PVC)
                            <div style="margin-bottom: 15px;">
                                <span style="font-weight: bold;">
                                    Your {{$appointment->serviceType->name}} PVC will be printed and delivered to your below address<br/>
                                </span>
                                <span>
                                    {{$appointment->delivery_address}}, {{$appointment->postal_code}}  
                                </span>
                            </div>
                        @endif
                        
                        <div class="divider"></div>
                        <div style="margin-bottom: 15px;">
                            <span style="font-weight: bold;">
                                {{$appointment->serviceType->name}} Booking Capture/Service Amount :<br/>
                            </span>
                            <span>
                                £ {{$appointment->amount - floatval($appointment->delivery_cost)}}
                            </span>
                        </div>
                        @if($appointment->card_type === $appointment::CARD_TYPE_PVC)
                            <div style="margin-bottom: 15px;">
                                <span style="font-weight: bold;">
                                    {{$appointment->serviceType->name}} PVC Card &  Delivery fee: 
                                </span>
                                <span>
                                    £ {{$appointment->delivery_cost}}
                                </span>
                            </div>
                        @endif
                        @if($appointment->status === \App\Models\Appointment::TOPAYONCAPTURE)
                            <div style="margin-bottom: 15px;">
                                <span style="font-weight: bold;">
                                    Total to pay :
                                </span>
                                <span>
                                    £ {{$appointment->amount}}
                                </span>
                            </div>
                        @endif
                        @if($appointment->status === \App\Models\Appointment::COMPLETED)
                            <div style="margin-bottom: 15px;">
                                <span style="font-weight: bold;">
                                    Total : 
                                </span>
                                <span>
                                    £ {{$appointment->amount}}
                                </span>
                            </div>
                        @endif
                    @endif
                    <div class="divider"></div>
                    <div style="margin-bottom: 15px;">
                        <span style="font-weight: bold;">
                            If you have any need to reschedule your booking or have an issue with payment?
                        </span>
                        <span>
                            <a href="https://ninuk.co.uk/contact">
                                Send us a message
                            </a>
                        </span>
                    </div>


                </div>


            </div>
            <div class="footer">
                This email was sent to example@example.com.
                <br>
                If this email you received, is not as a result of a recent action on <a
                    href="https://ninuk.co.uk">https://ninuk.co.uk</a>,
                please contact NIN UK team at:
                <span>
                    Unit 6, Block 3 Woolwich, Dockyard Industrial Estate, Woolwich Church St, Charlton, London SE18 5PQ<br/>
                    Call Us: +44 (0) 2032474747<br/>
                    Email Us: info@ninuk.co.uk <br/>
                </span>
                <a href="mailto:info@ninuk.co.uk">info@ninuk.co.uk</a>.
            </div>
            <div class="footer-bottom"></div>
        </div>
    </div>

</body>

</html>