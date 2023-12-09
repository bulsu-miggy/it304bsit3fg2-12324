<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();

        return view('profile.show', compact('user'));
    }
    public function updatePhoneNumber(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|numeric',
        ]);

        $user = auth()->user();

        if ($user instanceof User) {
            $user->phone_number = $request->phone_number;
            $user->save();

            return redirect()->back()->with('success', 'Phone number updated successfully!');
        }

        return redirect()->back()->with('error', 'Unable to update phone number.');
    }
    public function updateAddress(Request $request)
    {
        if (auth()->check()) {
            $request->validate([
                'address' => 'required|string|max:255',
            ]);

            auth()->user()->update([
                'address' => $request->address,
            ]);

            return redirect()->route('profile.show')->with('success', 'Address updated successfully!');
        } else {
            // Handle case where the user is not authenticated
        }
    }
    public function changePassword(Request $request)
    {
    $user = auth()->user();

    $request->validate([
        'old_password' => 'required|string',
        'new_password' => 'required|string|min:8',
        'confirm_password' => 'required|string|same:new_password',
    ]);

    // Check if the old password matches the user's current password
    if (!Hash::check($request->old_password, $user->password)) {
        return redirect()->back()->withInput()->withErrors(['old_password' => 'The old password is incorrect.']);
    }

    // Check if the new password is the same as the old password
    if (Hash::check($request->new_password, $user->password)) {
        return redirect()->back()->withInput()->withErrors(['new_password' => 'The new password must be different from the old password.']);
    }

    // Update the password
    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->back()->with('success', 'Password changed successfully!');
    }


}
