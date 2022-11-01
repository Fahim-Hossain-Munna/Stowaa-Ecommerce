@extends('layouts.frontend_master')

@section('content')

 <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Vendor -> Login/Register</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- register_section - start
            ================================================== -->
            <section class="register_section section_space">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">

                            <ul class="nav register_tabnav ul_li_center" role="tablist">
                                <li role="presentation">
                                    <button  data-bs-toggle="tab" data-bs-target="#signin_tab" type="button" role="tab" aria-controls="signin_tab" aria-selected="true">Sign In</button>
                                </li>
                                <li role="presentation">
                                    <button class="active" data-bs-toggle="tab" data-bs-target="#signup_tab" type="button" role="tab" aria-controls="signup_tab" aria-selected="false">Register</button>
                                </li>
                            </ul>

                            <div class="register_wrap tab-content">
                                <div class="tab-pane fade " id="signin_tab" role="tabpanel">

                                      <form action="{{ route('vendor.login') }}" method="POST">
                                          @csrf
                                          <div class="form_item_wrap">
                                              <h3 class="input_title">Email*</h3>
                                              <div class="form_item">
                                                  <label for="username_input"><i class="fas fa-user"></i></label>
                                                  <input id="username_input" type="email" name="email" placeholder="type e-mail">
                                              </div>
                                          </div>

                                          <div class="form_item_wrap">
                                              <h3 class="input_title">Password*</h3>
                                              <div class="form_item">
                                                  <label for="password_input"><i class="fas fa-lock"></i></label>
                                                  <input id="password_input" type="password" name="password" placeholder="type Password">
                                              </div>
                                              <div class="checkbox_item">
                                                  <input id="remember_checkbox" type="checkbox" name="remember">
                                                  <label for="remember_checkbox">Remember Me</label>
                                              </div>
                                          </div>

                                          <div class="form_item_wrap">
                                              <button type="submit" class="btn btn_primary">Sign In</button>
                                          </div>

                                          <div class="form_item_wrap mt-2">
                                            <a href="{{ route('password.request') }}">Forget your password! </a>
                                          </div>

                                      </form>

                                </div>

                                <div class="tab-pane fade show active" id="signup_tab" role="tabpanel">
                                    @if (session('vendor_register_msg'))
                                        <div class="alert alert-success">
                                           {{session('vendor_register_msg')}}
                                        </div>
                                    @endif
                                    @if (session('vendor_approval_msg'))
                                    <div class="alert alert-success">
                                       {{session('vendor_approval_msg')}}
                                    </div>
                                @endif
                                @if (session('vendor_not_vendor_msg'))
                                <div class="alert alert-success">
                                   {{session('vendor_not_vendor_msg')}}
                                </div>
                            @endif


                                    <form action="{{ route('vendor.register') }}" method="POST">
                                        @csrf
                                        <div class="form_item_wrap">
                                            <h3 class="input_title">User Name*</h3>
                                            <div class="form_item">
                                                <label for="username_input2"><i class="fas fa-user"></i></label>
                                                <input class="@error('name') is-invalid @enderror" id="username_input2" type="text" name="name" placeholder="User Name" value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Phone Number*</h3>
                                            <div class="form_item">
                                                <label for="username_input2"><i class="fas fa-user"></i></label>
                                                <input class="@error('phone_number') is-invalid @enderror" id="username_input2" type="tel" name="phone_number" placeholder="type phone number" value="{{ old('phone_number') }}">
                                                @error('phone_number')
                                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Email*</h3>
                                            <div class="form_item">
                                                <label for="email_input"><i class="fas fa-envelope"></i></label>
                                                <input class="@error('email') is-invalid @enderror" id="email_input" type="email" name="email" placeholder="type Email" value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Password*</h3>
                                            <div class="form_item">
                                                <label for="password_input2"><i class="fas fa-lock"></i></label>
                                                <input class="@error('password') is-invalid @enderror"  type="password" name="password" placeholder="type Password" value="{{ old('password') }}">
                                                @error('password')
                                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Confirm Password*</h3>
                                            <div class="form_item">
                                                <label for="password_input2"><i class="fas fa-lock"></i></label>
                                                <input class="@error('title') is-invalid @enderror" type="password" name="password_confirmation" placeholder="type confirm Password">
                                            </div>
                                        </div>


                                        <div class="form_item_wrap">
                                            <button type="submit" class="btn btn_secondary">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- register_section - end
            ================================================== -->


@endsection
