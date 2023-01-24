@extends('layouts.frontend_master')

@section('content')

 <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="{{ route('customer.home') }}">Home</a></li>
                        <li>Product Grid</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- product_section - start
            ================================================== -->
            <section class="product_section section_space">
                <h2 class="hidden">Product sidebar</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <aside class="sidebar_section p-0 mt-0">
                                <div class="sb_widget sb_category">
                                    <h3 class="sb_widget_title">Categories</h3>
                                    <ul class="sb_category_list ul_li_block">
                                       @forelse ($categories as $category)
                                         <li>
                                             <a href="{{ route('category.grid' , $category->id) }}">{{ $category->category_name }}<span></span></a>
                                         </li>

                                       @empty

                                       @endforelse
                                    </ul>
                                </div>


                            </aside>
                        </div>

                        <div class="col-lg-9">

                            <hr />

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="home" role="tabpanel">
                                    <div class="shop-product-area shop-product-area-col">
                                        <div class="product-area shop-grid-product-area clearfix">

                                                @forelse ($related_products as $product)
                                                <div class="grid">
                                                    <div class="product-pic">
                                                        @if ($product->product_picture)
                                                                <img src="{{ asset('all_images/vendor_products') }}/{{  $product->product_picture }}" alt='no image found'>
                                                        @else
                                                            <img src="{{ Avatar::create($item->product_name)->toBase64() }}" width="70" alt='no image found'>
                                                        @endif
                                                        @if ($product->product_discunted_price)
                                                            <span class="theme-badge-2">{{ Str::limit(($product->product_regular_price-$product->product_discunted_price)/$product->product_regular_price*100, 5) }}%</span>
                                                        @endif
                                                    </div>
                                                    <div class="details">
                                                        <h4><a href="{{ route('product.details', $product->id ) }}">{{ $product->product_name }}</a></h4>
                                                        <p><a href="{{ route('product.details', $product->id ) }}">{{ Str::limit($product->product_description , 50) }} </a></p>
                                                        <div class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                        </div>
                                                        <span class="price">
                                                            @if ($product->product_discunted_price)
                                                            <ins>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <bdi>
                                                                        <span class="woocommerce-Price-currencySymbol">৳</span>{{ $product->product_discunted_price }}
                                                                    </bdi>
                                                                </span>
                                                            </ins>
                                                        <del aria-hidden="true">
                                                          <span class="woocommerce-Price-amount amount">
                                                              <bdi>
                                                                  <span class="woocommerce-Price-currencySymbol">৳</span>{{ $product->product_regular_price }}
                                                              </bdi>
                                                          </span>
                                                      </del>
                                                      @else
                                                      <ins>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <bdi>
                                                                <span class="woocommerce-Price-currencySymbol">৳</span>{{ $product->product_regular_price }}
                                                            </bdi>
                                                        </span>
                                                    </ins>
                                                      @endif
                                                        </span>

                                                        <div class="add-cart-area">
                                                            <form action="{{ route('product.details', $product->id ) }}" method="GET">

                                                                <button class="add-to-cart">Check Out Details</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="error d-flex align-items-center justify-content-center" style="height: 300px; margin-bottom:30px;">
                                                    <span class="text-danger"> No Data Found!</span>
                                                </div>

                                            @endforelse



                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- product_section - end
            ================================================== -->


@endsection
