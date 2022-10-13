<?php

namespace App\Http\Controllers;

use App\Events\messages;
use App\Models\Category;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{


    public function index()
    {
        $categories = Category::all();
        return view('chat', compact('categories'));
    }

    public function sendMessage(Request $request)
    {
        event(
            new messages(
                $request->receiver_id,
                $request->sender_id,
                $request->message
            )

        );

        
    }    
}
