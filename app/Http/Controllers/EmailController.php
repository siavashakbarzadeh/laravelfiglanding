<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use App\Models\User;
class EmailController extends Controller
{
    public function index()
    {
//        return view('emailForm');
    }
    /**
     * Store a new user's email.
     *
     * @param  Request  $request
     * @return Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function submitForm(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'user_type' => 'required|string|in:artista,colezionista',
            'message' => 'required|string'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->user_type;
        $user->message = $request->message;  // Ensure your User model has a 'message' attribute if you're storing it
        $user->save();

        return redirect('/')->with('success', 'Your message has been received, We will contact you soon.');
    }
    public function sendEmail(Request $request)
    {
        $details = [
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to($details['email'])->send(new \App\Mail\SendMail($details));

        return back()->with('success', 'Email sent successfully!');
    }
}
