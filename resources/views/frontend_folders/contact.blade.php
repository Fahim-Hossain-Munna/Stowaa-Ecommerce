@extends('layouts.frontend_master')

@section('content')

      <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="index.html">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- contact_section - start
            ================================================== -->
            <div class="map_section">
                {{-- <iframe src="" allowfullscreen> --}}
                    <iframe src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d58472.369257636004!2d90.47092893449903!3d23.65724496709503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e3!4m3!3m2!1d23.6789144!2d90.4763885!4m3!3m2!1d23.6795705!2d90.4765079!5e0!3m2!1sen!2sbd!4v1660557868694!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </iframe>
            </div>
            <!-- contact_section - end
            ================================================== -->

            <!-- contact_section - start
            ================================================== -->
            <section class="contact_section section_space">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-6">
                            <div class="contact_info_wrap">
                                <h3 class="contact_title">Address <span>Information</span></h3>
                                <div class="decoration_image">
                                    <img src="{{ asset('frontend_assets') }}/assets/images/leaf.png" alt="image_not_found">
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="row">
                                    <div class="col col-md-6">
                                        <div class="contact_info_list">
                                            <h4 class="list_title">Colourbar U.S.A</h4>
                                            <ul class="ul_li_block">
                                                <li>Dhaka In Twin Tower Concord </li>
                                                <li>Shopping Complex</li>
                                                <li>Open  Closes 8:30PM </li>
                                                <li>yourinfo@gmail.com</li>
                                                <li>(1200)-0989-568-331</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col col-md-6">
                                        <div class="contact_info_list">
                                            <h4 class="list_title">USA Exchanger</h4>
                                            <ul class="ul_li_block">
                                                <li>Dhaka In Twin Tower Concord </li>
                                                <li>Shopping Complex</li>
                                                <li>Open  Closes 8:30PM </li>
                                                <li>yourinfo@gmail.com</li>
                                                <li>(1200)-0989-568-331</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col col-lg-6">
                            <div class="contact_info_wrap">
                                <h3 class="contact_title">Get In Touch <span>Inform Us</span></h3>
                                <div class="decoration_image">
                                    <img src="{{ asset('frontend_assets/assets') }}/images/leaf.png" alt="image_not_found">
                                </div>
                                @if (session('contact_msg_success'))
                                <div class="alert alert-success">
                                   {{session('contact_msg_success')}}
                                </div>
                                 @endif
                                <form action="{{ route('contact.post') }}" method="POST">
                                    @csrf
                                    <div class="form_item">
                                        <input id="contact-form-name" type="text" name="contact_name" placeholder="Your Name">
                                        @error('contact_name')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col col-md-6 col-sm-6">
                                            <div class="form_item">
                                            <input id="contact-form-email" type="email" name="contact_email" placeholder="Your Email">
                                            @error('contact_email')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                        </div>
                                        </div>
                                        <div class="col col-md-6 col-sm-6">
                                            <div class="form_item">
                                                <input type="text" name="contact_subject" placeholder="Your Subject">
                                                @error('contact_subject')
                                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_item">
                                        <textarea name="contact_message" placeholder="Message"></textarea>
                                        @error('contact_message')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <button type="submit" class="btn btn_dark">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact_section - end
            ================================================== -->

@endsection
