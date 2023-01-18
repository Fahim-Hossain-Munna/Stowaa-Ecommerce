<?php

namespace App\Http\Livewire\Frontendproducts;

use App\Models\Addcart;
use App\Models\Coupon;
use App\Models\ShippingCharge;
use Livewire\Component;

class ApplyCoupon extends Component
{
    public $coupon;
    public $error;
    public $TEST;
    public $test;
    public $after_discount = 0;
    public $how_much_discount = 0;
    public $shipping_dropdown;
    public $shipping_charge = 0;


    public function UpdatedShippingDropdown($id){
        $this->shipping_charge = $id;
        if($id == 0){
            $this->shipping_charge = 0;
        }else{
            $this->shipping_charge = ShippingCharge::findOrFail($id)->shipping_charge;
        }
    }


    public function applycoupon($vendor_id , $subtotal){
        if(!$this->coupon){
            $this->error = 'coupon field cant empty';
        }else{
            $this->error = '';
            if(Coupon::where('coupon_name' , $this->coupon)->exists()){
                $coupon = Coupon::where('coupon_name' , $this->coupon)->first();
                if($coupon->vendor_id != $vendor_id){
                    $this->error = 'wrong vendor coupon';
                }else{
                    if(Coupon::where('coupon_name', $this->coupon)->first()->coupon_min_amount <= $subtotal){
                        // $this->error = "all okay tk besi ase";
                        if($coupon->discount_type == 'Flat Discount' ){
                            $this->after_discount = $subtotal - $coupon->coupon_value;
                            $this->how_much_discount = $subtotal - $this->after_discount;
                        }else{
                            $this->after_discount = $subtotal-($coupon->coupon_value*$subtotal)/100;
                            $this->how_much_discount = $subtotal - $this->after_discount;
                        }
                    }else{
                        $this->error = "your purchase amount is too short";
                    }
                }
            }else{
                $this->error = 'wrong coupon added';
            }
        }

    }

    public function render()
    {
        $alls = Addcart::all();
        $shipping_items = ShippingCharge::all();
        return view('livewire.frontendproducts.apply-coupon', compact('alls','shipping_items'));
    }
}
