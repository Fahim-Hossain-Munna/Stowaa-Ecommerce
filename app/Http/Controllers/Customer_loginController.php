<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use PhpParser\Node\Expr\FuncCall;
use Auth;

class Customer_loginController extends Controller
{
    // public function customer_dash(){

    //     return view('customer_dashboard');
    // }

    public function customer_login(){

        return view('frontend_folders.customer_login_register');
    }
    public function registration_insert(Request $request){

        $request->validate([
            '*' => 'required'
        ]);

        User::insert([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'customer',
            'created_at' => Carbon::now()

        ]);
        return back()->with('customer_registration_success_msg' , 'Your Registration Completed,Please Login Your Account');
    }
    public function login(Request $request){
      $auth = $request->validate([
            '*' => 'required'
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password ])){
            return redirect('home');
        }
            return back();


    }
}
