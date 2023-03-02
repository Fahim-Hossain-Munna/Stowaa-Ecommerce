<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Invoice;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        if(auth()->user()->role == 'customer'){
            $totalOders = Invoice::where('customer_id',auth()->id())->get();
            return view('customer_dashboard',compact('totalOders'));
        }else{

            return view('home');
        }
    }
}
