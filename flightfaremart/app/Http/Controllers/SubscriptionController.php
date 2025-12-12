<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['email' => $request->input('subscribeEmail')]);
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscriptions,email',
        ], [
            'email.unique' => 'you are already subcribed our newsletter'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'subscription')->withInput()->with('subscription_error', 'Subscription failed. Please check your email.');
        }

        Subscription::create($request->only('email'));

        return back()->with('success', 'Thank you for subscribing!');
    }
}
