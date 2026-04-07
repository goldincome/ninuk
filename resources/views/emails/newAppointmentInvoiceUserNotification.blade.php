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

    <title>Invoice - Confirmation Of Reservation - NIN UK</title>
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
                    Hello,
                </div>

                <div style="margin-top: 20px;">
                    An appointment has been booked for {{$data['user_name']}}.
                    @if($data['appointment']->status === \App\Models\Appointment::TOPAYONCAPTURE)
                        @if($data['appointment']->serviceType->slug === $data['appointment']->serviceType::BVN || 
                            $data['appointment']->serviceType->slug === $data['appointment']->serviceType::BVN_PERSONAL_BANK_ACCOUNT
                            || $data['appointment']->serviceType->slug === $data['appointment']->serviceType::BVN_CORPORATE_BANK_ACCOUNT)
                            Your are to pay when you come for capture. </br>
                            Remember to come with your reference number <b>#{{$data['appointment']->ref}}</b>
                            and bring along any of the document below:</br>
                            - <b>Nigerian international passport </b> </br>
                            - <b>Nigerian NIN Verification Slip</b> </br>
                            An email will be sent shortly, to confirm your appointment booking.</br> 
                            Come with the email for your BVN capture </br>
                        @elseif($data['appointment']->serviceType->slug === $data['appointment']->serviceType::BANK_ACCOUNT || 
                            $data['appointment']->serviceType->slug === $data['appointment']->serviceType::BVN_PERSONAL_BANK_ACCOUNT 
                            || $data['appointment']->serviceType->slug === $data['appointment']->serviceType::BVN_CORPORATE_BANK_ACCOUNT)
                            Your are to pay when you come to fill your bank account opening form. </br>
                            Remember to come with your reference number <b>#{{$data['appointment']->ref}}</b>
                            and bring along all of the documents below:</br>
                            - <b>Your BVN No </b> </br>
                            - <b>Nigerian NIN Verification Slip</b> </br>
                            An email will be sent shortly, to confirm your appointment booking.</br> 
                            Come with the email for your Bank account opening.

                        @elseif($data['appointment']->serviceType->slug === $data['appointment']->serviceType::PASSPORT_5_YEARS || 
                            $data['appointment']->serviceType->slug === $data['appointment']->serviceType::PASSPORT_10_YEARS )
                                Your are to pay when you come to fill your Passport application form. </br>
                                Remember to come with your reference number <b>#{{$data['appointment']->ref}}</b>
                                and bring along all of the documents below:</br>
                                - <b>Nigerian international Passport Data Page </b> </br>
                                - <b>Nigerian NIN Verification Slip</b> </br>
                                - <b>Passport photo</b> </br>
                                - <b>Current Signature</b> </br>
                                An email will be sent shortly, to confirm your appointment booking.</br> 
                                Come with the email for your Passport Appplication.
                        @else
                            Your are to pay when you come for capture. Remember to come with your reference number <b>#{{$data['ref']}}</b>
                            and bring along your <b>BVN No</b> if you have one.<br/>
                            Come with this email for your NIN capture and also come on the date and time that you booked below.<br/>
                            Bring along verification documents (preferably the Nigerian passport).<br/>
 
                        @endif
                    @else
                        Please, come on the date and time that you booked below for your NIN capture.
                        Your payment was successful and your appointment with reference number <b>#{{$data['ref']}}</b> has been booked.
                        
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
                            {{$data['user_name']}}
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
                            {{$data['ref']}}
                        </span>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <span style="font-weight: bold;">
                            Service Type:
                        </span>
                        <span>
                            {{$data['appointment']->serviceType->name}}
                        </span>
                    </div>
                    
                    <div style="margin-bottom: 15px;">
                        <span style="font-weight: bold;">
                            Email Address :
                        </span>
                        <span>
                            {{$data['user_email']}}
                        </span>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <span style="font-weight: bold;">
                            Phone Number :
                        </span>
                        <span>
                            {{$data['user_phone']}}
                        </span>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <span style="font-weight: bold;">
                            Appointment Date :
                        </span>
                        <span>
                            {{$data['date']->format("M d, Y h:i A")}}
                        </span>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <span style="font-weight: bold;">
                            Appointment Time :
                        </span>
                        <span>
                            {{$data['start_time']}}
                        </span>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <span style="font-weight: bold;">
                            Appointment Duration :
                        </span>
                        <span>
                            {{$data['appointmentDurationInMinutes']}} mins
                        </span>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <span style="font-weight: bold;">
                            Venue Address for your capture/application :<br/>
                        </span>
                        <span>
                            {{$data['appointment']->location->location_name}}, <br/>
                            {{$data['appointment']->location->location_address}} <br/>
                            Call: {{$data['appointment']->location->contact_phone}}
                        </span>
                    </div>
                    @if($data['appointment']->serviceType->slug === $data['appointment']->serviceType::PASSPORT_5_YEARS || 
                        $data['appointment']->serviceType->slug === $data['appointment']->serviceType::PASSPORT_10_YEARS )
                        <div style="margin-bottom: 15px;">
                            <span style="font-weight: bold;">
                                Charges Apply<br/>
                            </span>
                            <span>
                                Application charges apply
                            </span>
                        </div>
                    @else 
                        @if($data['appointment']->card_type === $data['appointment']::CARD_TYPE_PVC)
                            <div style="margin-bottom: 15px;">
                                <span style="font-weight: bold;">
                                    Your {{$data['appointment']->serviceType->name}} PVC will be printed and delivered to your below address<br/>
                                </span>
                                <span>
                                    {{$data['appointment']->delivery_address}}, {{$data['appointment']->postal_code}}  
                                </span>
                            </div>
                        @endif
                        
                        <div class="divider"></div>
                        <div style="margin-bottom: 15px;">
                            <span style="font-weight: bold;">
                                {{$data['appointment']->serviceType->name}} Booking Capture/Service Amount :<br/>
                            </span>
                            <span>
                                £ {{$data['appointment']->amount - floatval($data['appointment']->delivery_cost)}}
                            </span>
                        </div>
                        @if($data['appointment']->card_type === $data['appointment']::CARD_TYPE_PVC)
                            <div style="margin-bottom: 15px;">
                                <span style="font-weight: bold;">
                                    {{$data['appointment']->serviceType->name}} PVC Card &  Delivery fee: 
                                </span>
                                <span>
                                    £ {{$data['appointment']->delivery_cost}}
                                </span>
                            </div>
                        @endif
                        @if($data['appointment']->status === \App\Models\Appointment::TOPAYONCAPTURE)
                            <div style="margin-bottom: 15px;">
                                <span style="font-weight: bold;">
                                    Total to pay :
                                </span>
                                <span>
                                    £ {{$data['appointment']->amount}}
                                </span>
                            </div>
                        @endif
                        @if($data['appointment']->status === \App\Models\Appointment::COMPLETED)
                            <div style="margin-bottom: 15px;">
                                <span style="font-weight: bold;">
                                    Total paid : 
                                </span>
                                <span>
                                    £ {{$data['appointment']->amount}}
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
                please contact NIN UK team at <a
                    href="mailto:info@ninuk.co.uk">info@ninuk.co.uk</a>.
            </div>
            <div class="footer-bottom"></div>
        </div>
    </div>

</body>

</html>