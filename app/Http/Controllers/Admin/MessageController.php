<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function messageList(){
        $messages = Message::latest()->paginate($this::PAGINATE_COUNT);
        return view('admin.messages.list', compact('messages'));
    }

    public function viewMessage(Message $message){
        if(!$message->read_status) {
            $message->read_status = true;
            $message->save();
        }
        return view('admin.messages.details', compact('message'));
    }

    public function markMessageAsUnread(Message $message){
        $message->read_status = false;
        $message->save();
        $this->flashSuccessMessage('Message marked as unread');
        return redirect()->route('admin.messageList');
    }
}
