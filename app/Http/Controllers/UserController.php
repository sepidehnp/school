<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('student.login');
    }

    public function authenticate(Request $request)
    {
       if ( Auth::attempt(['email'=>$request->email, 'password'=>$request->password ]))
       {
        if(Auth::user()->role != 'student'){
            Auth::logout();
            return redirect()->route('student.login')->with('error','Unautherise user. Access denied!');
        }
        return redirect()->route('student.dashboard');
       }else{
        return redirect()->route('student.login')->with('error','Unautherise user. Access denied!');
       }
    }
    public function dashboard()
    {
        return view('student.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('student.login')->with('error','logout successfully');
    }

    public function changePassword()
    {
        return view('student.change_password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([

            'old_password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required|same:new_password',
        ]);
         $old_password = $request->old_password;
         $new_password = $request->new_password;
         $user = User::find(Auth::user()->id);
         if(Hash::check($old_password,$user->password ))
         {
           $user->password = $new_password;
           $user->update();
           return redirect()->back()->with('success','old password changed successfully');
         }else{
           return redirect()->back()->with('error','old password does not match');

         }
        //return view('student.change_password');
    }
}
