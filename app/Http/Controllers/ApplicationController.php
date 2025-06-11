<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        if (Auth::user()->role !== 'user') {
            return redirect()->back()->with('error', 'Only users can apply to jobs.');
        }

        $request->validate([
            'job_id' => 'required|exists:job_posts,id',
        ]);

        $existing = Application::where('user_id', $user->id)
            ->where('job_id', $request->job_id)->first();

        if ($existing) {
            return redirect()->back()->with('error', 'You have already applied to this job.');
        }

        Application::create([
            'user_id' => $user->id,
            'job_id' => $request->job_id,
            'application_status' => 'pending',
            'application_date' => now(),
        ]);

        return redirect()->route('jobs.index')->with('success', 'Application submitted.');
    }

    public function myApplications()
    {
        $applications = Application::where('user_id', Auth::id())->with('job')->get();
        return view('user.my_applications', compact('applications'));
    }

    public function updateStatus(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        $request->validate([
            'application_status' => 'required|in:accepted,rejected,pending',
        ]);

        $application->application_status = $request->application_status;
        $application->save();

        return redirect()->back()->with('success', 'Application status updated.');
    }

    public function applicationsByJob($id)
    {
        $job = Job::with('applications.user')->findOrFail($id);

        if ($job->user_id !== Auth::id()) {
            abort(403);
        }

        return view('jobs.applications', compact('job'));
    }
}
