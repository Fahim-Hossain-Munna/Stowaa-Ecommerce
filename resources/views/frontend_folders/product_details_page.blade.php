@extends('layouts.frontend_master')

@section('content')

  <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="{{ route('customer.home') }}">Home</a></li>
                        <li>Product Details</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- product_details - start
            ================================================== -->
            <section class="product_details section_space pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-6">
                            <div class="product_details_image">
                                <div class="details_image_carousel">
                                    <div class="slider_item">
                                        <img src="{{ asset('all_images/vendor_products') }}/{{ $product->product_picture }}" alt="image_not_found" style="width: 100%;">
                                    </div>
                                    <div class="slider_item">
                                        <img src="{{ asset('all_images/vendor_products') }}/{{ $product->product_picture }}" alt="image_not_found" style="width: 100%;">
                                    </div>
                                    <div class="slider_item">
                                        <img src="{{ asset('all_images/vendor_products') }}/{{ $product->product_picture }}" alt="image_not_found" style="width: 100%;">
                                    </div>
                                    <div class="slider_item">
                                        <img src="{{ asset('all_images/vendor_products') }}/{{ $product->product_picture }}" alt="image_not_found" style="width: 100%;">
                                    </div>
                                    <div class="slider_item">
                                        <img src="{{ asset('all_images/vendor_products') }}/{{ $product->product_picture }}" alt="image_not_found" style="width: 100%;">
                                    </div>
                                    <div class="slider_item">
                                        <img src="{{ asset('all_images/vendor_products') }}/{{ $product->product_picture }}" alt="image_not_found" style="width: 100%;">
                                    </div>
                                    <div class="slider_item">
                                        <img src="{{ asset('all_images/vendor_products') }}/{{ $product->product_picture }}" alt="image_not_found" style="width: 100%;">
                                    </div>
                                    <div class="slider_item">
                                        <img src="{{ asset('all_images/vendor_products') }}/{{ $product->product_picture }}" alt="image_not_found" style="width: 100%;">
                                    </div>
                                </div>

                                <div class="details_image_carousel_nav">
                                    <div class="slider_item">
                                        <img src="{{ asset('all_images/vendor_products') }}/{{ $product->product_picture }}" alt="image_not_found">
                                    </div>
                                    <div class="slider_item">
                                        <img src="{{ asset('all_images/vendor_products') }}/{{ $product->product_picture }}" alt="image_not_found">
                                    </div>
                                    <div class="slider_item">
                                        <img src="{{ asset('all_images/vendor_products') }}/{{ $product->product_picture }}" alt="image_not_found">
                                    </div>
                                    <div class="slider_item">
                                        <img src="{{ asset('all_images/vendor_products') }}/{{ $product->product_picture }}" alt="image_not_found">
                                    </div>
                                    <div class="slider_item">
                                        <img src="{{ asset('all_images/vendor_products') }}/{{ $product->product_picture }}" alt="image_not_found">
                                    </div>
                                    <div class="slider_item">
                                        <img src="{{ asset('all_images/vendor_products') }}/{{ $product->product_picture }}" alt="image_not_found">
                                    </div>
                                    <div class="slider_item">
                                        <img src="{{ asset('all_images/vendor_products') }}/{{ $product->product_picture }}" alt="image_not_found">
                                    </div>
                                    <div class="slider_item">
                                        <img src="{{ asset('all_images/vendor_products') }}/{{ $product->product_picture }}" alt="image_not_found">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="product_details_content">
                                <h2 class="item_title">{{ $product->product_name }}</h2>
                                <p>{{ $product->product_description }}</p>
                                <div class="item_review">
                                    <ul class="rating_star ul_li">
                                        <li><i class="fas fa-star"></i>></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star-half-alt"></i></li>
                                    </ul>
                                    <span class="review_value">3 Rating(s)</span>
                                </div>

                                <div class="item_price">
                                    @if ($product->product_discunted_price)

                                    <span>৳ {{$product->product_discunted_price }}</span>
                                    <del>৳ {{ $product->product_regular_price }}</del>
                                    @else
                                    <span>৳ {{$product->product_regular_price }}</span>
                                    @endif

                                </div>
                                <hr>

                                @livewire('frontendproducts.cart',['product_id' => $product->id])
                                </div>

                        </div>
                    </div>

                    <div class="details_information_tab">
                        <ul class="tabs_nav nav ul_li" role=tablist>
                            <li>
                                <button class="active" data-bs-toggle="tab" data-bs-target="#description_tab" type="button" role="tab" aria-controls="description_tab" aria-selected="true">
                                Description
                                </button>
                            </li>
                            <li>
                                <button data-bs-toggle="tab" data-bs-target="#additional_information_tab" type="button" role="tab" aria-controls="additional_information_tab" aria-selected="false">
                                Additional information
                                </button>
                            </li>
                            <li>
                                <button data-bs-toggle="tab" data-bs-target="#reviews_tab" type="button" role="tab" aria-controls="reviews_tab" aria-selected="false">
                                Reviews(2)
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="description_tab" role="tabpanel">
                                <h2 class="item_title">{{ $product->product_name }}</h2>
                                <p>{{ $product->product_description }}</p>
                            </div>

                            <div class="tab-pane fade" id="additional_information_tab" role="tabpanel">
                                <h2 class="item_title">{{ $product->product_name }}</h2>

                                <div class="additional_info_list">
                                    <h4 class="info_title">Additional Info</h4>
                                    <ul class="ul_li_block">
                                        @if ($product->product_additional_description)
                                            <li>{{ $product->product_additional_description }}</li>
                                        @else
                                        <li>{{ $product->product_description }}</li>
                                        @endif
                                    </ul>
                                </div>

                                <div class="additional_info_list">
                                    <h4 class="info_title">Product Features Info</h4>
                                    <ul class="ul_li_block">
                                        <li>Compatible for indoor and outdoor use</li>
                                        <li>Wide polypropylene shell seat for unrivalled comfort</li>
                                        <li>Rust-resistant frame</li>
                                        <li>Durable UV and weather-resistant construction</li>
                                        <li>Shell seat features water draining recess</li>
                                        <li>Shell and base are stackable for transport</li>
                                        <li>Choice of monochrome finishes and colourways</li>
                                        <li>Designed by Nagi</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="reviews_tab" role="tabpanel">
                                <div class="average_area">
                                    <div class="row align-items-center">
                                        <div class="col-md-12 order-last">
                                            <div class="average_rating_text">
                                                <ul class="rating_star ul_li_center">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                                <p class="mb-0">
                                                Average Star Rating: <span>4 out of 5</span> (2 vote)
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="customer_reviews">
                                    <h4 class="reviews_tab_title">2 reviews for this product</h4>
                                    <div class="customer_review_item clearfix">
                                        <div class="customer_image">
                                            <img src="assets/images/team/team_1.jpg" alt="image_not_found">
                                        </div>
                                        <div class="customer_content">
                                            <div class="customer_info">
                                                <ul class="rating_star ul_li">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                                <h4 class="customer_name">Aonathor troet</h4>
                                                <span class="comment_date">JUNE 2, 2021</span>
                                            </div>
                                            <p class="mb-0">Nice Product, I got one in black. Goes with anything!</p>
                                        </div>
                                    </div>

                                    <div class="customer_review_item clearfix">
                                        <div class="customer_image">
                                            <img src="assets/images/team/team_2.jpg" alt="image_not_found">
                                        </div>
                                        <div class="customer_content">
                                            <div class="customer_info">
                                                <ul class="rating_star ul_li">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                                <h4 class="customer_name">Danial obrain</h4>
                                                <span class="comment_date">JUNE 2, 2021</span>
                                            </div>
                                            <p class="mb-0">
                                            Great product quality, Great Design and Great Service.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="customer_review_form">
                                    <h4 class="reviews_tab_title">Add a review</h4>
                                    <form action="#">
                                        <div class="form_item">
                                            <input type="text" name="name" placeholder="Your name*">
                                        </div>
                                        <div class="form_item">
                                            <input type="email" name="email" placeholder="Your Email*">
                                        </div>
                                        <div class="your_ratings">
                                            <h5>Your Ratings:</h5>
                                            <button type="button"><i class="fal fa-star"></i></button>
                                            <button type="button"><i class="fal fa-star"></i></button>
                                            <button type="button"><i class="fal fa-star"></i></button>
                                            <button type="button"><i class="fal fa-star"></i></button>
                                            <button type="button"><i class="fal fa-star"></i></button>
                                        </div>
                                        <div class="form_item">
                                            <textarea name="comment" placeholder="Your Review*"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn_primary">Submit Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- product_details - end
            ================================================== -->

            <!-- related_products_section - start
            ================================================== -->
            <section class="related_products_section section_space">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="best-selling-products related-product-area">
                                <div class="sec-title-link">
                                    <h3>Related products</h3>
                                    <div class="view-all"><a href="#">View all<i class="fal fa-long-arrow-right"></i></a></div>
                                </div>
                                <div class="product-area clearfix">
                                    @forelse ($related_products as $product)
                                    <div class="grid">
                                        <div class="product-pic">
                                            @if ($product->product_picture)
                                                    <img src="{{ asset('all_images/vendor_products') }}/{{  $product->product_picture }}" alt='no image found'>
                                            @else
                                                <img src="{{ Avatar::create($item->product_name)->toBase64() }}" width="70" alt='no image found'>
                                            @endif
                                            @if ($product->product_discunted_price)
                                                <span class="theme-badge-2">{{ Str::limit(($product->product_discunted_price/$product->product_regular_price )*100 , 5) }}%</span>
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
            </section>
            <!-- related_products_section - end
            ================================================== -->

@endsection
