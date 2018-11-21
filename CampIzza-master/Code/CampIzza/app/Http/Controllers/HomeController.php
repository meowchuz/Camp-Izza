<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $request->user()->authorizeRoles(['owner', 'counselor', 'parent']);
        return view('pages.dashboard');
    }

    /**
     * Show change password page
     *
     * @return \Illuminate\Http\Response
     */
    public function showChangePasswordForm(){
        return view('auth.changePassword');
    }

    /**
     * Handling change password
     * 
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request){
        $currentPassword = $request->get('current-password');
        $newPassword = $request->get('new-password');

        if (!(Hash::check($currentPassword, Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with('error', 'Your current password does not matches with the password you provided. Please try again.');
        }

        if(strcmp($currentPassword, $newPassword) == 0){
            //Current password and new password are same
            return redirect()->back()->with('error', 'New Password cannot be same as your current password. Please choose a different password.');
        }
    
        $this->validate($request, [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed'
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($newPassword);
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully!');
    }
}
