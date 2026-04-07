<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendPaidBookingMailable extends Mailable
{
    use Queueable, SerializesModels;

    private $appointmentData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->appointmentData = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $file = [];
        $details = json_decode($this->appointmentData['appointment']->details);
        if($this->appointmentData['appointment']->serviceType->slug === \App\Models\ServiceType::NPC_ATTESTATION_BIRTH_CERTIFICATE || 
        $this->appointmentData['appointment']->serviceType->slug === \App\Models\ServiceType::NPC_NOTIFICATION_BIRTH_CERTIFICATE)
        {
            if(isset($details->birth_location) && in_array($details->birth_location, \App\Enums\BirthLocationEnum::toArray()))
            {
                if($details->applying_for === \App\Enums\ApplyingForEnum::CHILDREN->value && $details->birth_location === \App\Enums\BirthLocationEnum::BOTH_IN_OUTSIDE_NIGERIA->value)
                {
                    $file = storage_path('app/public/NPC-Foreign-Birth-Certificate-Registration-Form.pdf');
                }
                if($details->applying_for === \App\Enums\ApplyingForEnum::CHILDREN->value && $details->birth_location === \App\Enums\BirthLocationEnum::BORN_IN_NIGERIA->value)
                {
                     $file = storage_path('app/public/NPC-Nigerian-Born-Birth-Certificate-Registration-Form.pdf');
                }
                if($details->applying_for === \App\Enums\ApplyingForEnum::CHILDREN->value && $details->birth_location === \App\Enums\BirthLocationEnum::BORN_OUTSIDE_NIGERIA->value)
                {
                     $file = storage_path('app/public/NPC-Foreign-Birth-Certificate-Registration-Form.pdf');
                }          
            }
        }

        if($this->appointmentData['appointment']->serviceType->slug === \App\Models\ServiceType::TAX_IDENTIFICATION_NUMBER)
        {
            $file = storage_path('app/public/TIN_Registration_Form.pdf');
        }
        
        $mail = $this->view('emails.newPaidBookingUserNotification', [
            'data' => $this->appointmentData,
        ])
        ->to($this->appointmentData['user_email'])
        // ->cc('ifylovely@mailinator.com')
        ->from('info@ninuk.co.uk')
        ->subject('NIN UK Capture Booking Confirmation');
        if($file){
            $mail->attach($file);
        }
        return $mail;

    }
}
