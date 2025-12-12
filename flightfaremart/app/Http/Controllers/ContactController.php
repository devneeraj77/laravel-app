<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon; // Added Carbon for date manipulation

class ContactController extends Controller
{
    /**
     * Display a listing of the contact messages for the admin panel.
     * This method renders the view at resources/views/admin/contacts/index.blade.php
     */
    public function index()
    {
        // Fetch all contact messages, ordered by creation date (newest first)
        $messages = ContactMessage::orderBy('created_at', 'desc')->get();

        // Renders the view using the path: admin.contacts.index
        return view('admin.contacts.index', compact('messages'));
    }

    /**
     * Show the public contact form view.
     */
    public function create()
    {
        return view('contact');
    }

    /**
     * Store a new contact message in the database.
     */
    public function store(Request $request)
    {
        // 1. Validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('contact.create')
                ->withErrors($validator, 'contact')
                ->withInput();
        }
        

        // --- NEW RATE LIMITING LOGIC ---
        $userEmail = $request->input('email');
        $lastSubmission = ContactMessage::where('email', $userEmail)
                                        ->orderByDesc('created_at')
                                        ->first();

        if ($lastSubmission) {
            $oneMonthAgo = Carbon::now()->subMonth(); // Using Carbon's subMonth() for clarity

            if ($lastSubmission->created_at->greaterThan($oneMonthAgo)) {
                $daysRemaining = $lastSubmission->created_at->diffInDays(Carbon::now()->addMonth()); // Calculate days until one month is complete
                return redirect()->route('contact.create')->with('contact_error', "You can only submit a contact message once every month. Please try again after " . ($daysRemaining + 1) . " days."); // Assuming 30 days as a month
            }
        }
        // --- END NEW RATE LIMITING LOGIC ---


        // 2. Data Storage
        try {
            ContactMessage::create($request->only(['name', 'email', 'subject', 'message','is_read']));

            // 3. Redirect with success message
            return redirect()->route('contact.create')->with('success', 'Thank you for your message! We will get back to you soon.');

        } catch (\Exception $e) {
            return redirect()->route('contact.create')->with('contact_error', 'An error occurred while saving your message. Please try again.');
        }
    }

    /**
     * Mark a specific contact message as read.
     *
     * @param  \App\Models\ContactMessage  $contactMessage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAsRead(ContactMessage $contactMessage)
    {
        $contactMessage->is_read = true;
        $contactMessage->save();

        return back()->with('success', 'Message marked as read.');
    }

    /**
     * Remove the specified contact message from storage.
     *
     * @param  \App\Models\ContactMessage  $contactMessage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return back()->with('success', 'Message deleted successfully.');
    }
}