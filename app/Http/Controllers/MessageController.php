<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Message;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required',
            'user_type' => 'required|in:artista,colezionista',
            'accept_rules' => 'accepted',
        ]);

        Email::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'user_type' => $request->user_type
        ]);

        return back()->with('success', 'Message sent successfully!');
    }
}
