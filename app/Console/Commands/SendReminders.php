<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Appointment;
use App\Models\ReminderSetting;
use Illuminate\Console\Command;
use App\Models\AppointmentReminder;
use Illuminate\Support\Facades\Mail;

class SendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminders';
    


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send appointment reminders';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $activeDays = ReminderSetting::where('status', true)
        ->pluck('number_of_days')
        ->unique();
        
        foreach ($activeDays as $day) {
            $targetDate = Carbon::today()->addDays($day);
            $appointments = Appointment::whereDate('date', $targetDate)
                ->whereDoesntHave('reminders', function ($query) use ($day) {
                    $query->where('days_before', $day);
                })->get();
            foreach ($appointments as $appointment) {
                try {
                    Mail::send(new \App\Mail\AppointmentReminder($appointment, $day));
                    
                    AppointmentReminder::create([
                        'appointment_id' => $appointment->id,
                        'days_before' => $day,
                        'sent_at' => now(),
                    ]);
                } catch (\Exception $e) {
                    \Log::error("Reminder failed: {$e->getMessage()}");
                }
            }
            
        }
    }
}
