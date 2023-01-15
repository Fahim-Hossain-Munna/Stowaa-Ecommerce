<div>
    @php
        $subtotal = 0 ;
        $cart_error = false;
        $inventories = App\Models\Inventory::all();
        foreach ($inventories as $inventory) {
            $func = getAvailableQuantity($inventory->product_id,$inventory->color_id,$inventory->size_id);
            $carts = App\Models\Addcart::where([
                'product_id' => $inventory->product_id,
                'color_id' =>  $inventory->color_id,
                'size_id' => $inventory->size_id,
            ])->get();
        }
         $carts->first()->quantity;
         if($func < $carts->first()->quantity){
            $cart_error = true;
         }
        foreach ($alls as $all) {
           $subtotal += $all->unit_price*$all->quantity;
        }
    @endphp



    <div class="cart_btns_wrap">
        <div class="row">
            <div class="col col-lg-6">
                <form>
                    <div class="coupon_form form_item mb-0">
                        <input type="text" wire:model="coupon" name="coupon" placeholder="Coupon Code...">
                        <button type="button" wire:click="applycoupon({{$alls->first()->vendor_id}},{{$subtotal}})" class="btn btn_dark">Apply Coupon</button>
                        {{-- <div class="info_icon">
                            <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Your Info Here"></i>
                        </div> --}}
                    </div>
                    <small class="text-danger">{{ $error }}</small>
                </form>
            </div>

            <div class="col col-lg-6">
                <ul class="btns_group ul_li_right">
                    {{-- <li><a class="btn border_black" href="#!">Update Cart</a></li> --}}
                    @if ($cart_error)
                    <li><a class="btn btn-danger" href="#!">Can't Prceed To Checkout</a></li>
                     @else
                    <li><a class="btn btn_dark" href="#!">Prceed To Checkout</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col col-lg-6">
            <div class="calculate_shipping">
                <h3 class="wrap_title">Calculate Shipping <span class="icon"><i class="far fa-arrow-up"></i></span></h3>
                <form action="#">
                    <div class="select_option clearfix">
                       <div class="col-6">
                        <select class="form-select">
                            <option value="">Select Your Option</option>
                            <option value="1">Inside City</option>
                            <option value="2">Outside City</option>
                        </select>
                       </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn_primary rounded-pill">Update Total</button>
                </form>
            </div>
        </div>

        <div class="col col-lg-6">
            <div class="cart_total_table">
                <h3 class="wrap_title">Cart Totals</h3>
                <ul class="ul_li_block">
                    <li>
                        <span>Cart Subtotal</span>
                        <span>${{ $subtotal }}</span>

                    </li>
                    <li>
                        <span>Delivery Charge</span>
                        <span>$5</span>
                    </li>
                    <li>
                        <span>After Discount Total</span>
                        <span class="total_price">${{  $after_discount }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</section>
<!-- cart_section - end
================================================== -->
</div>
