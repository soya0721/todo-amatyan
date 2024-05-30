<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
   public function myPage()
    {
        $user = auth()->user();

        return view('profile.show', ['user' => $user]);
    }


    public function editProfile()
    {
        $user = auth()->user();

       return view('profile.edit', compact('user'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
    
        $user = Auth::user();
    
        // Verify current password
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'The current password is incorrect.');
        }
    
        // Update user information
        $user->name = $request->name;
        $user->email = $request->email;
    
        // Update password
        $user->password = Hash::make($request->new_password);
    
        try {
            $user->save();
            return redirect()->route('profile.myPage')->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            // Log any errors for debugging
            \Log::error('Error updating user profile: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating your profile.');
        }
    }
    


}