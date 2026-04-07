<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Location;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;

class AdminController extends Controller
{
    public function adminList(){
        $admins = User::paginate($this::PAGINATE_COUNT);
        return view('admin.admins.list', compact('admins'));
    }

    public function newAdmin(){
        $admin = $this->getAuthUser();
        $locations = Location::where('status', Location::LOCATION_STATUS_ACTIVE)->get();
        return view('admin.admins.add-admin', compact('admin', 'locations'));
    }

    public function appointmentList(Request $request){
        $locations = Location::select('id', 'location_name')->get();
        $searchTerm = $request->search;
        $loggedInAdmin = $this->getAuthUser();
        $query =  Appointment::query();

        if($searchTerm){
            $query
                ->where('ref', 'LIKE', "%{$searchTerm}%")
                ->orWhere('user_name', 'LIKE', "%{$searchTerm}%")
                ->orWhere('user_email', 'LIKE', "%{$searchTerm}%")
                ->orWhere('user_phone', 'LIKE', "%{$searchTerm}%")
                ->orWhere('card_type', 'LIKE', "%{$searchTerm}%");
        }

        if($request->status && $request->status == 'upcoming'){
            $query->where('status', Appointment::UPCOMING);
        }

        if($request->start_date){
                $query->whereDate('date', '>=', $request->start_date);
                $query->whereDate('date', '<=',  $request->end_date ?? $request->start_date);
        }
        if($request->location_id){
            $query->where('location_id', $request->location_id);
        }
        if($request->all() == null){
            $today = now()->format('Y-m-d');
            $query->whereDate('date', '=', $today);
        }

        // if(!$loggedInAdmin->isSuperAdmin() ){
        //     $query->where('location_id', $loggedInAdmin->location_id);
        // }

        if($request->download_report){
            $downloadQuery = $query;
            $fileName = 'appointments_records.csv';
            $appointmentsDownload = $downloadQuery->get();

            $headers = [
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=appointments_records.csv",
                "Pragma"              => "public",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            ];

            $columns = ['Ref Num', 'Name', 'Email', 'Phone', 'Booked Date', 'Location', 'Amount Paid', 'Status', 'Card Type', 'Postal Code', 'Delivery Address'];

            $callback = function() use ($appointmentsDownload, $columns){
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach ($appointmentsDownload as $appointment) {
                    $row['Ref Num'] = '#'.$appointment->ref;
                    $row['Name'] = $appointment->user_name;
                    $row['Email'] = $appointment->user_email;
                    $row['Phone'] = $appointment->user_phone;
                    $row['Booked Date'] = $appointment->date;
                    $row['Duration'] = $appointment->duration;
                    $row['Amount Paid'] = $appointment->amount;
                    //$row['Status'] = $appointment->status ? 'Upcoming' : 'Completed';
                    $row['Location'] = $appointment->location->location_name;
                    $row['Card Type'] = $appointment->card_type;
                    $row['Postal Code'] = $appointment->postal_code;
                    $row['Delivery Address'] = $appointment->delivery_address;
                    if($appointment->status =  Appointment::UPCOMING){
                        $row['Status'] = 'Upcoming';
                    }
                    if($appointment->status =  Appointment::COMPLETED){
                        $row['Status'] = 'Completed';
                    }
                    if($appointment->status =  Appointment::PAYMENT_FAILED){
                        $row['Status'] = 'Payment Failed';
                    }
                    if($appointment->status =  Appointment::CANCELLED){
                        $row['Status'] = 'Payment cancelled/refunded';
                    }
                    if($appointment->status =  Appointment::TOPAYONCAPTURE){
                        $row['Status'] = 'To Pay On Capture';
                    }
                    
                    fputcsv($file, [$row['Ref Num'], $row['Name'], $row['Email'], $row['Phone'], $row['Booked Date'], $row['Location'], $row['Amount Paid'], $row['Status'], $row['Card Type'], $row['Postal Code'], $row['Delivery Address']]);
                }

                fclose($file);
            };

            return  response()->stream($callback, 200, $headers);
        }
        $appointments = $query->latest()->paginate($this::PAGINATE_COUNT);
        return view('admin.appointments.list', compact('appointments', 'locations'));
    }
       

    public function appointmentReschedule(Appointment $appointment){
        $locations = Location::where('status', Location::LOCATION_STATUS_ACTIVE)->get();
        return view('admin.appointments.reschedule', compact('appointment', 'locations'));
    }

    public function appointmentRescheduleUpdate(Request $request, Appointment $appointment){
        $durationPerAppointment = config('settings.duration_per_appointment');
        $bookedDateAndTime = Carbon::createFromTimestamp(strtotime($request->date . $request->time));

        $appointment->location_id =  $request->location_id;
        $appointment->date =  $bookedDateAndTime;
        $appointment->start_time = $bookedDateAndTime->toTimeString();
        $appointment->end_time = $bookedDateAndTime->copy()->addMinutes($durationPerAppointment)->toTimeString();
        $appointment->duration = config('settings.duration_per_appointment');
        $appointment->save();

        // email sent for update

        $this->flashSuccessMessage('Appointment Reschedule Successful');
        return redirect()->route('admin.appointmentList');
    }

    public function markAsDone(Appointment $appointment){
        if($appointment->status  == Appointment::TOPAYONCAPTURE){
            $appointment->payment->payment_status = Payment::PAYMENTSTATUS['completed'];
        }
        $appointment->status = Appointment::COMPLETED;
        $appSaved = $appointment->save();
        if($appSaved){
            $appointment->payment->save();
        }
        $this->flashSuccessMessage('Appointment Marked as Done');
        return back();
    }
    public function cancelAppointment(Request $request, Appointment $appointment)
    {
        if($appointment->status === Appointment::COMPLETED){
            $this->flashSuccessMessage('You cannot cancel a completed appointment');
            return redirect()->route('admin.appointmentList');
        }
        $appointment->status = Appointment::CANCELLED;
        $appSaved = $appointment->save();
        if($appSaved){
            $appointment->payment->payment_status = Payment::PAYMENTSTATUS['cancelled'];
            $appointment->payment->save();
        }
        $this->flashSuccessMessage('Appointment cancelled successful');
            return redirect()->route('admin.appointmentList');
    }
}
