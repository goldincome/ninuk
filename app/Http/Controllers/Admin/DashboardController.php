<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use App\Models\Payment;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    
    public function index()
    {
        $data = [];
        $data['total_payment'] = Payment::where('payment_status',Payment::PAYMENTSTATUS['completed'])->sum('amount_paid');
        $data['total_upcoming_appointment']  = Appointment::where('status', Appointment::UPCOMING)->orWhere('status', Appointment::TOPAYONCAPTURE)->count();
        $data['all_appointment'] = Appointment::count();
        $data['total_unread_messages'] = Message::where('read_status', false)->count();
        return view('admin.dashboard', ['data' => $data]);
    }
}
