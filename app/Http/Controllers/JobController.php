<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    // Tampilkan semua job 
public function index(Request $request)
{
    $jobs = Job::query();

    if ($request->filled('keyword')) {
        $jobs->where('title', 'like', '%' . $request->keyword . '%');
    }

    if ($request->filled('location')) {
        $jobs->where('location', 'like', '%' . $request->location . '%');
    }

    if ($request->filled('job_type')) {
        $jobs->where('job_type', $request->job_type);
    }

    $jobs = $jobs->with('user', 'applications')->latest()->paginate(10)->withQueryString();

    return view('jobs.index', compact('jobs'));
}


    // Tampilkan job milik employer yang sedang login
    public function myJobs()
    {
        $user = Auth::user();
        $jobs = Job::where('user_id', $user->id)->with('applications')->get();
        return view('jobs.my_jobs', compact('jobs'));
    }

    // Tampilkan form tambah job
    public function create()
    {
        return view('jobs.create');
    }

    // Simpan job baru
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|numeric',
            'location' => 'required|string|max:255',
            'job_type' => 'required|string|max:50',
            'status' => 'required|in:open,closed',
        ]);

        $validated['user_id'] = Auth::id();
        Job::create($validated);

        return redirect()->route('jobs.my')->with('success', 'Lowongan berhasil dibuat.');
    }

    // Tampilkan detail job
    public function show($id)
    {
        $job = Job::with(['user', 'applications.user'])->findOrFail($id);

        $alreadyApplied = false;

        if (Auth::check() && Auth::user()->role === 'user') {
            $alreadyApplied = $job->applications->contains('user_id', Auth::id());
        }

        return view('jobs.show', compact('job', 'alreadyApplied'));
    }


    // Tampilkan form edit job
    public function edit($id)
    {
        $job = Job::findOrFail($id);

        if ($job->user_id !== Auth::id()) {
            abort(403);
        }

        return view('jobs.edit', compact('job'));
    }

    // Update data job
    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        if ($job->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|numeric',
            'location' => 'required|string|max:255',
            'job_type' => 'required|string|max:50',
            'status' => 'required|in:open,closed',
        ]);

        $job->update($validated);

        return redirect()->route('jobs.my')->with('success', 'Lowongan berhasil diperbarui.');
    }

    // Hapus job
    public function destroy($id)
    {
        $job = Job::findOrFail($id);

        if ($job->user_id !== Auth::id()) {
            abort(403);
        }

        $job->delete();

        return redirect()->route('jobs.my')->with('success', 'Lowongan berhasil dihapus.');
    }
}
