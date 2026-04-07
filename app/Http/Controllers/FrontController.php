<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\MessageFormRequest;
use App\Models\OurService;
use App\Models\ServiceType;
use Throwable;

class FrontController extends Controller
{
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function contactUs(){

        $locations = Location::where('status', Location::LOCATION_STATUS_ACTIVE)->get();

        return view('contact-us', compact('locations'));
    }

    public function bvn(){

        $locations = Location::where('status', Location::LOCATION_STATUS_ACTIVE)->get();

        return view('bvn', compact('locations'));
    }

    public function certificateOptions(){
        $notificationBirthCertificate =  ServiceType::where('slug', ServiceType::NPC_NOTIFICATION_BIRTH_CERTIFICATE)->with('ourService')->first() ?? null;
        $attestationBirthCertificate =  ServiceType::where('slug', ServiceType::NPC_ATTESTATION_BIRTH_CERTIFICATE)->with('ourService')->first() ?? null;
        return view('birth-certificate-options', compact('notificationBirthCertificate', 'attestationBirthCertificate'));
    }

    public function birthCertificate(){

        $birthCertificate =  ServiceType::where('slug', ServiceType::NPC_ATTESTATION_BIRTH_CERTIFICATE)
        ->orWhere('slug', ServiceType::NPC_NOTIFICATION_BIRTH_CERTIFICATE)
        ->with('ourService')->first() ?? null; 
        return view('npc-birth-certificate', compact('birthCertificate'));
    }

    public function tin(){

        $tin =  ServiceType::where('slug', ServiceType::TAX_IDENTIFICATION_NUMBER)->with('ourService')->first() ?? null; 
        return view('tin', compact('tin'));
    }

    public function nigerianPassport(){

        $locations = Location::where('status', Location::LOCATION_STATUS_ACTIVE)->get();
        return view('nigerian-passport', compact('locations'));
    }

    public function sendAdminMessage(MessageFormRequest $request){
        $data = $request->validated();
        unset($data['captcha']);
        $data['contactUs'] = Message::create($data);

        try{
            Mail::send('emails.newContactUsMessageAdminNotification-backend', $data, function ($message){
                $message->to(config('app.admin_email'), 'NIN - UK');
                $message->subject('New Message -NIN - UK');
                $message->replyTo('info@ninuk.co.uk');
            });
        } catch(Throwable $e){
            $this->flashSuccessMessage('Contact Us Message Sent Successfully');
            return back();
        }

        $this->flashSuccessMessage('Contact Us Message Sent Successfully');
        return back();
    }

   public function processNinRegistrationDownNotification(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_no' => 'required|string|max:20',
            'message' => 'nullable|string|max:500',
        ]);
        if (empty($request->type) || $request->type !== 'nin_registration_down') {
            return back()->withErrors(['error' => 'Request not valid.']);
        }
        $data['location_id'] = Location::where('status', Location::LOCATION_STATUS_ACTIVE)->first()->id;
        $data['phone'] = $data['phone_no'];
        unset($data['phone_no']);
        unset($data['type']);
        $data['subject'] = 'NIN Registration Down Notification';
        $data['output'] = Message::create($data);

        try {
            Mail::send('emails.ninRegistrationDownNotification', $data, function ($message){
                $message->to(config('app.admin_email'), 'NIN - UK');
                $message->subject('NIN Registration Down Notification');
                $message->replyTo('info@ninuk.co.uk');
            });
            
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to send notification. Please try again later.']);
        } catch (Throwable $e) {
            return back()->withErrors(['error' => 'Failed to send notification. Please try again later.']);
        }

        return back()->with('success', 'Your request has been sent successfully.');
    }
}
