@extends('layouts.frontend_master')
@section('content')
    <style>
        .halka_lal{
            background: rgba(201, 131, 131, 0.541);
        }
    </style>

<!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="{{ route('customer.home') }}">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- cart_section - start
            ================================================== -->
            <section class="cart_section section_space">
                <div class="container">

                    <div class="cart_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Shop Owner</th>
                                    <th class="text-center">Size</th>
                                    <th class="text-center">Color</th>
                                    <th class="text-center">Unit Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $subtotal = 0;
                                @endphp
                                @forelse ($carts as $cart)
                                {{-- @php
                                    if(getAvailableQuantity($cart->product_id,$cart->color_id,$cart->size_id)){
                                        $error = true;
                                    }
                                @endphp --}}
                                <tr class="{{getAvailableQuantity($cart->product_id,$cart->color_id,$cart->size_id) < $cart->quantity ? "halka_lal" : ""  }} ">
                                      <td>
                                          <div class="cart_product">
                                              <img src="{{ asset('all_images/vendor_products') }}/{{ $cart->ProductTableRelation->product_picture }}" alt="image_not_found">
                                              <h3><a href="{{ route('product.details', $cart->product_id) }}" target="_blank">{{ $cart->ProductTableRelation->product_name }}</a></h3>
                                              @if (getAvailableQuantity($cart->product_id,$cart->color_id,$cart->size_id) < $cart->quantity)
                                              <h3 class="text-danger">Total Stock: {{ getAvailableQuantity($cart->product_id,$cart->color_id,$cart->size_id) }} {{ $cart->quantity }} </h3>
                                            @endif
                                          </div>
                                      </td>
                                </div>
                                      <td class="text-center"><span class="price_text text-success">{{ $cart->VendorTableRelation->name }} </span></td>
                                      <td class="text-center"><span class="price_text">{{ $cart->SizeTableRelation->size_name }}</span></td>
                                      <td class="text-center"><span class="price_text badge rounded-pill" style="background: {{ $cart->ColorTableRelation->color_code }};">&nbsp</span> <span class="price_text">{{ $cart->ColorTableRelation->color_name }}</span>  </td>
                                      <td class="text-center"><span class="price_text">৳ {{ $cart->unit_price }}</span></td>
                                      <td class="text-center">
                                          <form action="#">
                                              <div class="quantity_input">
                                                  {{-- <button type="button" class="input_number_decrement">
                                                      <i class="fal fa-minus"></i>
                                                  </button>
                                                  <input class="input_number" type="text" value="1" />
                                                  <button type="button" class="input_number_increment">
                                                      <i class="fal fa-plus"></i>
                                                  </button> --}}
                                                  <h3> {{ $cart->quantity }} </h3>

                                              </div>
                                          </form>
                                      </td>
                                      <td class="text-center"><span class="price_text">৳ {{ $cart->unit_price*$cart->quantity }}</span></td>
                                      @php
                                        $subtotal += $cart->unit_price*$cart->quantity;
                                        getAvailableQuantity($cart->product_id,$cart->color_id,$cart->size_id);
                                      @endphp
                                      <td class="text-center"><button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button></td>
                                    </tr>
                                    @empty

                                  <tr>
                                    <td colspan="50">
                                        <section class="empty_cart_section section_space">
                                            <div class="container">
                                                <div class="empty_cart_content text-center">
                                                    <span class="cart_icon">
                                                        <i class="icon icon-ShoppingCart"></i>
                                                    </span>
                                                    <h3>There are no more items in your cart</h3>
                                                    <a class="btn btn_secondary" href="{{ route('customer.home') }}"><i class="far fa-chevron-left"></i> Continue shopping </a>
                                                </div>
                                            </div>
                                        </section>
                                    </td>
                                  </tr>

                                    @endforelse

                            </tbody>
                        </table>
                    </div>

                    @livewire('frontendproducts.apply-coupon')


            <!-- cart_section - end
            ================================================== -->

@endsection
