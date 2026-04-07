<?php

namespace App\Http\Controllers;

use App\Enums\BirthLocationEnum;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use App\Services\AddBookingToSessionService;
use App\Http\Requests\Bookings\PreCheckoutBookingRequest;


class PreCheckoutController extends Controller
{

    public function show($slug){
        $serviceType = ServiceType::where('slug', $slug)->firstOrFail();
        if(!isset($serviceType)){
            return redirect()->back()->with('error', 'Service not found, please contact admin');
        }
        $serviceType->load('ourService');

        if($serviceType->slug === ServiceType::NPC_ATTESTATION_BIRTH_CERTIFICATE || $serviceType->slug === ServiceType::NPC_NOTIFICATION_BIRTH_CERTIFICATE){
            if($serviceType->slug === ServiceType::NPC_ATTESTATION_BIRTH_CERTIFICATE){
                $birthLocation = BirthLocationEnum::BORN_IN_NIGERIA->value;
            }
            else{
                $birthLocation = BirthLocationEnum::BORN_OUTSIDE_NIGERIA->value;
            }

            $birthCertificate =  $serviceType;
            return view('book.create-birth-certificate', compact('birthCertificate', 'birthLocation'));
        }
        if($serviceType->slug === ServiceType::TAX_IDENTIFICATION_NUMBER){
            $tin =  $serviceType;
            return view('book.create-tin', compact('tin'));
        }
        
        return redirect()->back()->with('error', 'Service not found, please contact admin');
    }


    public function store(PreCheckoutBookingRequest $request)
    {   
        $serviceType =  ServiceType::where('slug', $request->slug)->with('ourService')->first() ?? null;
        if(!isset($serviceType)){
            return redirect()->back()->with('error', 'Service not found, please contact admin');
        }

        $data = app(AddBookingToSessionService::class)->addBookingDataToSession($serviceType, $request);
        
        //For manual offline payment
        return redirect()->route('bookings.show', $data['ref']);
        //For Online payment
        //return redirect()->route('checkout.index', $data['ref']);
    }
   
}
