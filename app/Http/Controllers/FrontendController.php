<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Frontendproducts\Cart;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact_massage;
use App\Models\Service;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact_guest;
use App\Models\Addcart;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\VariationSize;

class FrontendController extends Controller
{
    public function front_root(){
        $categories = Category::all();
        $services = Service::all();
        $sponsors = Sponsor::all();
        $products = Product::latest()->limit(6)->get();
        return view('frontend_folders.index' , compact( 'categories','services','sponsors','products'));
    }
    public function product_details($id){
        $product = Product::findOrFail($id);
        $related_products = Product::where('category_id' , '=' , $product->category_id)->where('id' , '!=' , $id)->get();

        return view('frontend_folders.product_details_page' , compact('product','related_products'));
    }

    public function contact_page(){
        return view('frontend_folders.contact');
    }

    public function contact_page_post(Request $request){
        $request->validate([
            'contact_name' => 'required',
            'contact_email' => 'required',
            'contact_subject' => 'required',
            'contact_message' => 'required'
        ]);

        Contact_massage::insert([
            'contact_name' => $request->contact_name,
            'contact_email' => $request->contact_email,
            'contact_subject' => $request->contact_subject,
            'contact_message' => $request->contact_message
        ]);

        Mail::to($request->contact_email)->send(new Contact_guest($request->except('_token')));

        return back()->with('contact_msg_success', 'Your Valueble Massage Recive Succesfully.');
    }

    public function category_grid($id){
        // $product = Product::findOrFail($id);
        $related_products = Product::where('category_id' ,'=', $id)->get();
        $categories = Category::all();


        return view('frontend_folders.category_grid' , compact('related_products','categories'));
    }
    public function product_add_cart(){

        $carts = Addcart::where('customer_id' , auth()->id())->get();

        return view('frontend_folders.product_cart', compact('carts'));
    }

}
