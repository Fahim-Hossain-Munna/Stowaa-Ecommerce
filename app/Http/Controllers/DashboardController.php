<?php

namespace App\Http\Controllers;

use App\Mail\VendorApprovalMail;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\User;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // profile mathod start
    public function profile(){
        return view('dashboard_folders.profile');
    }
    public function image_upload(Request $request){
        $request->validate([
            'photo_update' => 'required|image'
        ]);

        $new_name = auth()->user()->name ."_".auth()->id()."_"."profile". "_" . Carbon::now()->format("Y-m-d") . "." .$request->file('photo_update')->getClientOriginalExtension();
        $img = Image::make($request->file('photo_update'))->resize(300, 300);
        $img->save(base_path('public/profile_uploaded_image/' . $new_name), 80);

        User::find( auth()->id() )->update([
            "photo_update" => $new_name
        ]);

        return back();
    }

    public function data_update(Request $request){
        User::find(auth()->id())->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,

        ]);
        return back();
    }
    public function change_profile_password(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ]);
        if(Hash::check($request->current_password, auth()->user()->password)){
           User::find(auth()->id())->update([
            'password' => bcrypt($request->password)
           ]);
           return back()->with('password_success' ,'Update Password Successfully');
        }else{
            return back()->withErrors('Your given password doesnt match with your old password');
        }

    }
    // profile method end


    // users method start
    public function users(){
        $vendors = User::where('role' , 'vendor')->latest()->get();
       $user_info = User::where('role' , 'customer')->latest()->get();
       $users = User::where('role' , 'admin')->latest()->get();
         return view('dashboard_folders.users' , compact('user_info','users','vendors'));
    }

    public function admin_register(Request $request){
        $request->validate([
            'admin_email' => 'unique:App\Models\User,email'
        ]);

        $random_password = Str::upper(Str::random(6));

        User::insert([
            'name' => $request->admin_name,
            'email' => $request->admin_email,
            'password' => bcrypt($random_password),
            'created_at' => Carbon::now(),
            'role' => 'admin',
        ]);
        return back()->with('admin_add','New Admin Account Open Succesfully Cheif');
    }
    public function vendor_status(Request $request,$id){
        $vendors_active = User::find($id);

        if($vendors_active->status == 0){
            $vendors_active->status = 1;
        }else{
            $vendors_active->status = 0;

        }

        Mail::to($vendors_active->email)->send(new VendorApprovalMail($vendors_active));

        $vendors_active->save();
        return back();

    }

}
