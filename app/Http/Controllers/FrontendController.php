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
use App\Models\Invoice;
use App\Models\InvoiceProductManagement;
use App\Models\Product;
use App\Models\VariationSize;
use Khsing\World\Models\Country;
use Khsing\World\World;
use Khsing\World\Models\Continent;

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
    public function product_delete_cart($id){

         Addcart::find($id)->delete();
        return back();
    }
    public function product_checkout(){

        $restrict_user_url = explode('/', url()->previous());

        if(end($restrict_user_url) == 'cart'){
            $all_countries = World::Countries();
            return view('frontend_folders.checkout_page' , compact('all_countries'));
        }else{
            abort(404);
        }
    }

    public function getcitylist(Request $request){

        $country_code = Country::getByCode($request->country_code);
        $cities = $country_code->children();
        $generated_city_dropdown = "";

        foreach ($cities as $city) {
            $generated_city_dropdown .= "<option value='$city->id'>$city->name</option>";
        }
        return $generated_city_dropdown;
    }

    public function payment(Request $request){
            //  if(session('after_discount') == 0){
            //   $odertotal =  session('subtotal')+session('shipping_charge');
            // }else{
            //     $odertotal =  session('after_discount')+session('shipping_charge');
            // }


            // $invoice_id = Invoice::insertGetId([

            //     'customer_id' => auth()->id(),
            //     'customer_name' => $request->customer_name,
            //     'customer_email' => $request->customer_email,
            //     'customer_contact_number' => $request->customer_contact_number,
            //     'customer_country_code' => $request->customer_country_code,
            //     'customer_city_code' => $request->customer_city_code,
            //     'customer_address' => $request->customer_address,
            //     'customer_remark' => $request->customer_remark,
            //     'coupon_name' => session('coupon_name'),
            //     'discounted_amount' => session('how_much_discount'),
            //     'shipping_charge' => session('shipping_charge'),
            //     'product_subtotal' => session('subtotal'),
            //     'product_round_final_total' => $odertotal,
            //     'payment_method' => $request->payment_method,
            //     'created_at' => now()

            // ]);

            // foreach(Addcart::where('customer_id' , auth()->id())->get() as $cart){
            //     InvoiceProductManagement::insert([
            //         'invoice_id' => $invoice_id,
            //         'customer_id' => auth()->id(),
            //         'vendor_id' => $cart->vendor_id,
            //         'product_id' => $cart->product_id,
            //         'size_id' => $cart->size_id,
            //         'color_id' => $cart->color_id,
            //         'unit_price' => $cart->unit_price,
            //         'quantity' => $cart->quantity,
            //         'created_at' => now()
            //     ]);

            //     Inventory::where([
            //         'vendor_id' => $cart->vendor_id,
            //         'product_id' => $cart->product_id,
            //         'size_id' => $cart->size_id,
            //         'color_id' => $cart->color_id,
            //     ])->decrement('quantity' , $cart->quantity);

            //     $cart->delete();
            // }

            if($request->payment_method == 'Cash On Delivery'){
                return redirect()->route('product.add.cart');
            }else{
                return redirect('pay-via-ajax');
            }
    }

}
