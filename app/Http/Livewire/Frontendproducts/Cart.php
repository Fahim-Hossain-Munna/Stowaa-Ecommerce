<?php

namespace App\Http\Livewire\Frontendproducts;

use App\Models\Addcart;
use App\Models\Inventory;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;

class Cart extends Component
{
    public $product_id ;

    public $size_dropdown;
    public $color_dropdown;
    public $colors;
    public $unit_price = 0;
    public $total_price = 0;
    public $available_stock = 0;
    public $visibility = 'd-none';
    public $count = 1;
    public $inventory_id ;
    public $all_total = 0;


    public function increment()
    {
        if($this->count < $this->available_stock){
            $this->count++;
            $this->total_price = $this->unit_price*$this->count;
        }

    }
    public function decrement()
    {
        if($this->count > 1){
            $this->count--;
            $this->total_price = $this->unit_price*$this->count;

        }
    }


    public function updatedSizeDropdown($size_id)
    {
        $this->count = 1;
        $this->visibility = 'd-none';
        $this->available_stock = 0;
        $this->unit_price = 0 ;
        $this->total_price = 0;
        $this->colors = Inventory::where('product_id' , $this->product_id)->where('size_id' , $size_id)->get();

    }
    public function updatedColorDropdown($color_id)
    {
        $this->visibility = '';
        $this->inventory_id = Inventory::find($color_id);
        $this->available_stock = $this->inventory_id->quantity;

        if(Product::find($this->inventory_id->product_id)->product_discunted_price){

            $this->unit_price = Product::find($this->inventory_id->product_id)->product_discunted_price;
        }else{
            $this->unit_price = Product::find($this->inventory_id->product_id)->product_regular_price;
        }

    }
    public function submittocart()
    {

        if(
            Addcart::where([
                'customer_id' => auth()->id(),
                'vendor_id' => $this->inventory_id->vendor_id,
                'product_id' => $this->inventory_id->product_id,
                'size_id' => $this->inventory_id->size_id,
                'color_id' => $this->inventory_id->color_id,
            ])->exists()
        ){


            Addcart::where([
                'customer_id' => auth()->id(),
                'vendor_id' => $this->inventory_id->vendor_id,
                'product_id' => $this->inventory_id->product_id,
                'size_id' => $this->inventory_id->size_id,
                'color_id' => $this->inventory_id->color_id,
            ])->increment('quantity' , $this->count);


        }else{

            if($this->count == 1){
                Addcart::insert([
                    'customer_id' => auth()->id(),
                    'vendor_id' => $this->inventory_id->vendor_id,
                    'product_id' => $this->inventory_id->product_id,
                    'size_id' => $this->inventory_id->size_id,
                    'color_id' => $this->inventory_id->color_id,
                    'quantity' => $this->count,
                    'unit_price' => $this->unit_price,
                    'created_at' => Carbon::now()
                ]);
            }else{
            Addcart::insert([

                'customer_id' => auth()->id(),
                'vendor_id' => $this->inventory_id->vendor_id,
                'product_id' => $this->inventory_id->product_id,
                'size_id' => $this->inventory_id->size_id,
                'color_id' => $this->inventory_id->color_id,
                'quantity' => $this->count,
                'unit_price' => $this->unit_price,
                'created_at' => Carbon::now()
            ]);
            }

        }



        return redirect()->route('product.add.cart');

    }

    public function render()
    {
        $product = Product::all();
        $sizes = Inventory::where('product_id' , '=' , $this->product_id)->get();
        // $colors = Inventory::where('product_id' , '=' , $id)->where('size_id' , '=' , )->get();

        return view('livewire.frontendproducts.cart' , compact('sizes','product'));
    }
}
