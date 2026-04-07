<?php

namespace App\Mail;

use Barryvdh\DomPDF\PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class sendBookingInvoiceMailable extends Mailable
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
        if($this->appointmentData['appointment']->serviceType->slug === \App\Models\ServiceType::NPC_ATTESTATION_BIRTH_CERTIFICATE || 
            $this->appointmentData['appointment']->serviceType->slug === \App\Models\ServiceType::NPC_NOTIFICATION_BIRTH_CERTIFICATE || 
            $this->appointmentData['appointment']->serviceType->slug === \App\Models\ServiceType::TAX_IDENTIFICATION_NUMBER)
        {
            $mail = $this->view('emails.newPaidBookingUserNotification', [
                'data' => $this->appointmentData,
            ])
            ->to($this->appointmentData['user_email'])
            ->from('info@ninuk.co.uk')
            ->subject('NIN UK Service Booking Confirmation');

            $pdfOutput = null;
            $details = json_decode($this->appointmentData['appointment']->details);
            
            if($this->appointmentData['appointment']->serviceType->slug === \App\Models\ServiceType::NPC_NOTIFICATION_BIRTH_CERTIFICATE)
            {
                $pdf = FacadePdf::loadView('emails.pdf.NPCNotificationFormBirthCertificate', ['data' => $this->appointmentData]);
                $pdfOutput = $pdf->output();
                // Attach the dynamically generated PDF
                $mail->attachData($pdfOutput, $this->appointmentData['appointment']->serviceType->slug.'.pdf', [
                    'mime' => 'application/pdf',
                ]);
             
            }
            if($this->appointmentData['appointment']->serviceType->slug === \App\Models\ServiceType::NPC_ATTESTATION_BIRTH_CERTIFICATE){
                $pdf = FacadePdf::loadView('emails.pdf.NPCAttestationFormBirthCertificate', ['data' => $this->appointmentData]);
                $pdfOutput = $pdf->output();
                // Attach the dynamically generated PDF
                $mail->attachData($pdfOutput, $this->appointmentData['appointment']->serviceType->slug.'.pdf', [
                    'mime' => 'application/pdf',
                ]);
            }

            if($this->appointmentData['appointment']->serviceType->slug === \App\Models\ServiceType::TAX_IDENTIFICATION_NUMBER)
            {
                $pdf = FacadePdf::loadView('emails.pdf.TINRegistrationForm', ['data' => $this->appointmentData]);
                $pdfOutput = $pdf->output();
                // Attach the dynamically generated PDF
                $mail->attachData($pdfOutput, $this->appointmentData['appointment']->serviceType->slug.'.pdf', [
                    'mime' => 'application/pdf',
                ]);
               
            }
 
            return $mail;
        }
        else{

            return $this->view('emails.newAppointmentInvoiceUserNotification', [
                'data' => $this->appointmentData,
            ])
            ->to($this->appointmentData['user_email'])
            ->from('info@ninuk.co.uk')
            //->cc('ifylovely@mailinator.com')
            ->subject('NIN UK Service Booking Confirmation');
        }
    }
}
