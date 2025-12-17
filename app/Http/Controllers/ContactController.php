<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display the contact page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Store a new contact form submission
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // TODO: Send email or save to database
        // In a real implementation, you would send an email or save to database
        // For now, just flash a success message

        // Flash success message to session
        return redirect()->route('contact')->with('success', 'Thank you for your message. We will get back to you soon!');
    }
}
