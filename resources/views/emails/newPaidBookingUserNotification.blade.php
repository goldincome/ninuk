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
                    Hello, {{$data['user_name']}}
                </div>

                <div style="margin-top: 20px;">
                    Your application was successful and your reference number <b>#{{$data['ref']}}</b>.
                    @if($data['appointment']->serviceType->slug === \App\Models\ServiceType::NPC_ATTESTATION_BIRTH_CERTIFICATE || 
                        $data['appointment']->serviceType->slug === \App\Models\ServiceType::NPC_NOTIFICATION_BIRTH_CERTIFICATE)<br/>
                        @if($data['appointment']->payment->payment_gateway === \App\Enums\PaymentMethodEnum::Offline->value)
                            You have successfully applied for {{ $data['appointment']->serviceType->name }} assistance service.<br/>
                            Please, follow the information stated below, <br/>
                            to make payment and process your {{ $data['appointment']->serviceType->name }}.
                            Print and fill the attached PDF to this email and and send it back to us along<br/>
                        @else
                            You have successfully booked for {{ $data['appointment']->serviceType->name }} assistance service.<br/>
                            Please, print and fill the attached PDF and send it to us via email along<br/>
                        @endif
                       
                        with below required information to enable us process your {{ $data['appointment']->serviceType->name }}.
                        <ul>
                            <li>Attach you passport photograph</li>
                            <li>Print the Attached form and Fill it in block letters. </li> 
                        </ul>
                    @endif  
                    @if($data['appointment']->serviceType->slug === \App\Models\ServiceType::TAX_IDENTIFICATION_NUMBER)
                        <br/>
                        You have successfully applied for {{ $data['appointment']->serviceType->name }} assistance service.<br/>
                        Please, follow the information stated below, <br/>
                        to make payment and process your {{ $data['appointment']->serviceType->name }}.
                        Please, print and fill the attached PDF and send it back to us via email along with below required information to enable us process your {{ $data['appointment']->serviceType->name }}.
                        <ul>
                            <li>Attach a scanned copy of your valid BVN SLIP or BVN No</li>
                            <li>Print the Attached form and Fill it in block letters and then sent it to us via email with the above. </li>   
                        </ul>
                    @endif
                    <br/>
                    =======================================================
                    <br/>Note: Please, remember to always include your Reference No({{$data['ref']}}) in all comunication with us.<br/>
                    =============================================================
                    <br/><br/>
                    
                    Your details below.
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
                    {{--  
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
                      --}}
                        <div class="divider"></div>
                       
                       
                            <div style="margin-bottom: 15px;">
                                <span style="font-weight: bold;">
                                    Total to Pay : 
                                </span>
                                <span>
                                    £ {{$data['appointment']->amount}}
                                </span>
                            </div>
                    
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