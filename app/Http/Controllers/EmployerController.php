<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    public function profile()
    {
        $employer = Auth::user();
        return view('employer.profile', compact('employer'));
    }

    public function updateProfile(Request $request)
{
    $validated = $request->validate([
        'company_name' => 'required|string|max:255',
        'company_address' => 'required|string',
        'company_phone' => 'required|string',
    ]);

    $user = Auth::user();

    if ($user->role !== 'employer') {
        abort(403);
    }

    $user->update($validated);
    return redirect()->back()->with('success', 'Profile updated successfully.');
}

}
