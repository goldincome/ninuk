<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class AppointmentReminder extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $appointment;
    public $days;
    /**
     * Create a new message instance.
     */
    public function __construct(Appointment $appointment, $days)
    {
        $this->appointment = $appointment;
        $this->days = $days;
    }

   /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newAppointmentReminderNotification', [
            'appointment' => $this->appointment,
            'days' => $this->days,
        ])
        ->to($this->appointment->user_email)
        ->from('info@ninuk.co.uk', 'NINUK')
       // ->cc('ifylovely@mailinator.com')
        ->subject('NINUK Appointment Reminder Notification('.$this->days.' Days)')
        ->delay(now()->addMinutes(5));
    }
}
