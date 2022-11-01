<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VendorManageController extends Controller
{
    public function vendor_view(){
        return view('frontend_folders.vendor_login_register');
    }
    public function vendor_login(Request $request){
        if( User::where('email', $request->email)->first()->role == 'vendor'){
            if (Auth::attempt(['email' => $request->email , 'password' => $request->password , 'status' => 1])) {
                return redirect('home');

        }else{
            return back()->with('vendor_approval_msg', 'Please Wait!! Admin still not approve your request yet');
        }
        }else{
            return back()->with('vendor_not_vendor_msg', 'Please Wait!! You Not A "Vendor" Please Registration first');
        }

    }
    public function vendor_registration(Request $request){

        $request->validate([
            '*' => 'required'
        ]);

        User::insert([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => Carbon::now(),
            'role' => 'vendor'
        ]);
        return back()->with('vendor_register_msg', 'Your Registration Done Succesfully');
    }
}
