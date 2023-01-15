<?php

use App\Models\Inventory;

function total_cart_details(){
    return App\Models\Addcart::where('customer_id' , auth()->id())->count();
}
function getAvailableQuantity($product_id,$color_id,$size_id){
    return Inventory::where([
        'product_id' => $product_id,
        'color_id' =>  $color_id,
        'size_id' => $size_id,
    ])->first()->quantity;
}

?>
