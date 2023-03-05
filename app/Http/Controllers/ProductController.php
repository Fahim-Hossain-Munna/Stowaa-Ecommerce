<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Invoice;
use App\Models\InvoiceProductManagement;
use App\Models\Product;
use App\Models\VariationColor;
use App\Models\VariationSize;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::where('vendor_id' , auth()->id())->get();
        return view('dashboard_folders.products.index' ,compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cetegories = Category::all();

        return view('dashboard_folders.products.create', compact('cetegories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     '*' => 'required'
        // ]);

        $product = Product::create([
            'vendor_id' => auth()->id() ,
            'category_id' => $request-> category_id,
            'product_name' => $request->product_name ,
            'product_description' => $request->product_description ,
            'product_regular_price' => $request->product_regular_price ,
            'product_discunted_price' => $request->product_discunted_price ,
            'product_short_description' => $request->product_short_description ,
           'product_additional_description' => $request->product_additional_description ,
           'created_at' => Carbon::now()
        ]);

        if($request->hasFile('product_picture')){

            $new_name = $request->product_name ."_". auth()->user()->name."_"."profile". "_" . Carbon::now()->format("Y-m-d") . "." .$request->file('product_picture')->getClientOriginalExtension();
            $img = Image::make($request->file('product_picture'))->resize(500, 500);
            $img->save(base_path('public/all_images/vendor_products/'. $new_name), 80);

            Product::find($product->id)->update([
                'product_picture' => $new_name,
            ]);
        }
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        VariationColor::find($id)->delete();
        VariationSize::find($id)->delete();
        return back();
    }

    public function variation()
    {
        $sizes = VariationSize::where('vendor_id' , '=' , auth()->id())->get();
        $colors = VariationColor::where('vendor_id' , '=' , auth()->id())->get();
        return view('dashboard_folders.products_variation.variations' , compact('sizes', 'colors'));
    }
    public function variation_size_add(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);

        VariationSize::insert([
            'vendor_id' => auth()->id(),
            'size_name' => $request->size_name,
            'created_at' => Carbon::now()
        ]);
        return back();
    }
    public function variation_color_add(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);

        VariationColor::insert([
            'vendor_id' => auth()->id(),
            'color_name' => $request->color_name,
            'color_code' => $request->color_code,
            'created_at' => Carbon::now()
        ]);
        return back();
    }

    public function inventory_add($id)
    {
        $inventory_product =  Product::findOrFail($id);
       $sizes = VariationSize::where('vendor_id' ,'=', auth()->id() )->get();
        $colors = VariationColor::where('vendor_id' ,'=', auth()->id() )->get();
        $inventories = Inventory:: where('vendor_id' ,'=', auth()->id() )->where('product_id', '=', $id)->get();

        return view('dashboard_folders.products.inventory', compact('inventory_product','sizes','colors' ,'inventories'));
    }
    public function inventory_add_post($id , Request $request)
    {

      $existsInventory =  Inventory::where([
            'vendor_id' => auth()->id(),
            'product_id' => $id,
            'size_id' => $request->size_id,
           'color_id' => $request->color_id,
        ])->first();

        if($existsInventory){
            $existsInventory->increment('quantity' , $request->quantity) ;
            $existsInventory->save();
        }else{

            Inventory::insert([
                'vendor_id' => auth()->id(),
                'product_id' => $id,
                'size_id' => $request->size_id,
               'color_id' => $request->color_id,
                'quantity' => $request->quantity,
                'created_at' => Carbon::now()
             ]);
        }
        return back();

    }

    public function order_track(){
        $order_products = InvoiceProductManagement::where('vendor_id',auth()->id())->get();
        return view('dashboard_folders.products.trackorder',compact('order_products'));
    }
    public function order_track_post(Request $request,$id){
         Invoice::findOrFail($id)->update([
            'order_status' => $request->order_status,
            'updated_at' => now()
        ]);

        if($request->order_status == 'delivered'){
            if(Invoice::findOrFail($id)->payment_method == 'Cash On Delivery'){
                Invoice::findOrFail($id)->update([
                    'payment_status' => 'paid',
                    'updated_at' => now()
                ]);
            }
        }
        if($request->order_status == 'processing'){
            if(Invoice::findOrFail($id)->payment_method == 'Cash On Delivery'){
                Invoice::findOrFail($id)->update([
                    'payment_status' => 'unpaid',
                    'updated_at' => now()
                ]);
            }
        }

        return back();
    }
}
