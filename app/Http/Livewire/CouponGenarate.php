<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use Carbon\Carbon;
use Livewire\Component;

class CouponGenarate extends Component
{
    public $visibility = "d-none";
    public $discount_type ;
    public $coupon_name ;
    public $coupon_value ;
    public $coupon_min_amount ;


    public function updatedDiscountType(){
        $this->visibility = '';
    }
    public function deleteCoupon($coupon_id){
        Coupon::find($coupon_id)->delete();
        return back();
    }
    public function coupon_genarate(){
        Coupon::insert([
            'vendor_id' => auth()->id(),
            'coupon_name' => $this->coupon_name,
            'coupon_min_amount' => $this->coupon_min_amount,
            'discount_type' => $this->discount_type,
            'coupon_value' => $this->coupon_value,
            'created_at' => Carbon::now()
        ]);
        $this->visibility = 'd-none';
    }

    public function render()
    {
        $coupons = Coupon::where('vendor_id' , auth()->id())->get();
        return view('livewire.coupon-genarate', compact('coupons'));
    }
}
