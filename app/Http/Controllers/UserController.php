<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function UserDashboard(){

        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('front.dashboard',compact('userData'));

    } // End Method

    public function UserProfileStore(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            $file = $request->file('photo');
            @unlink(public_path('uploads/'.$data->photo));
            $filename = uniqid().$file->getClientOriginalName();
            $file->move(public_path('uploads/'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();

        return back()->with('success', 'Profile Updated Successfully');

    } // End Method


    public function UserLogout(Request $request){

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with("success", "User Logout Successfully");

    } // End Method

}
