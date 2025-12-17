<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuoteController extends Controller
{
    /**
     * Show the form for creating a new quote request.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quotes.create');
    }

    /**
     * Store a newly created quote request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'cargo_type' => 'required|string|max:255',
            'weight' => 'nullable|string|max:50',
            'dimensions' => 'nullable|string|max:255',
            'shipping_date' => 'nullable|date',
            'message' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Save the quote request to the database as a lead
        $lead = Lead::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'origin' => $request->origin,
            'destination' => $request->destination,
            'cargo_type' => $request->cargo_type,
            'shipping_mode' => $request->shipping_mode,
            'container_size' => $request->container_size,
            'weight' => $request->weight,
            'dimensions' => $request->dimensions,
            'shipping_date' => $request->shipping_date,
            'message' => $request->message,
            'status' => 'new',
            'source' => 'website_quote_form',
            'utm_source' => $request->session()->get('utm_source'),
            'utm_medium' => $request->session()->get('utm_medium'),
            'utm_campaign' => $request->session()->get('utm_campaign'),
        ]);
        
        // In a future update, we could add email notifications:
        // Event::dispatch(new NewLeadCreated($lead));
        
        // Log the lead creation
        \Log::info('New quote request created', ['lead_id' => $lead->id]);

        return redirect()
            ->route('quote.create')
            ->with('success', 'Thank you! Your quote request has been submitted successfully. Our team will contact you shortly.');
    }
}
