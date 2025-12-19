<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Post;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SubscriptionsExport;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        // If already logged in, go to dashboard
        if (Session::has('admin_id')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Session::put('admin_id', $admin->id);
            Session::put('admin_name', $admin->name);
            Session::put('admin_email', $admin->email);
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function dashboard()
    {
        // Prevent unauthorized access
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.login')->with('error', 'Please login first');
        }

        $totalPosts = Post::count();
        $publishedPosts = Post::where('is_published', true)->count();
        $draftPosts = Post::where('is_published', false)->count();
        $totalCategories = Category::count();
        $totalMessages = ContactMessage::count();
        $unreadMessages = ContactMessage::where('is_read', false)->count();
        $recentPosts = Post::with('category', 'author')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPosts',
            'publishedPosts',
            'draftPosts',
            'totalCategories',
            'totalMessages',
            'unreadMessages',
            'recentPosts'
        ));
    }

    public function subscriptions()
    {
        $subscriptions = Subscription::latest()->paginate(20);
        return view('admin.subscriptions', compact('subscriptions'));
    }

    public function exportSubscriptions(Request $request)
    {
        $format = $request->query('format');

        if ($format == 'csv') {
            $subscriptions = Subscription::all();
            $headers = [
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=subscriptions.csv",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            ];

            $callback = function() use ($subscriptions) {
                $file = fopen('php://output', 'w');
                fputcsv($file, ['ID', 'Email', 'Subscribed At']);

                foreach ($subscriptions as $subscription) {
                    fputcsv($file, [$subscription->id, $subscription->email, $subscription->created_at->toDateTimeString()]);
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }

        if ($format == 'xlsx') {
            return Excel::download(new SubscriptionsExport, 'subscriptions.xlsx');
        }

        return redirect()->back()->with('error', 'Invalid export format.');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully');
    }

    public function adminHome()
    {
        // If admin logged in, redirect to dashboard
        if (Session::has('admin_id')) {
            return redirect()->route('admin.dashboard');
        }

        // Else redirect to login
        return redirect()->route('admin.login');
    }

    public function destroySubscription(Subscription $subscription)
    {
        $subscription->delete();

        return redirect()->route('admin.subscriptions.index')->with('success', 'Subscription deleted successfully.');
    }

    public function destroyMultipleSubscriptions(Request $request)
    {
        $request->validate([
            'subscription_ids' => 'required|array',
            'subscription_ids.*' => 'exists:subscriptions,id',
        ]);

        Subscription::whereIn('id', $request->subscription_ids)->delete();

        return redirect()->route('admin.subscriptions.index')->with('success', 'Selected subscriptions deleted successfully.');
    }
}

