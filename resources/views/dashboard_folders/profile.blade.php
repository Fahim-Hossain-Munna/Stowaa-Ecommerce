@extends('layouts.dashboard_master')

@section('content')

<div class="col-lg-12">
    <div class="profile card card-body px-3 pt-3 pb-0">
        <div class="profile-head">
            <div class="photo-content">
                <div class="cover-photo"></div>
            </div>
            <div class="profile-info">
                <div class="profile-photo">
                    @if (auth()->user()->photo_update)
                    <img src="{{ asset('profile_uploaded_image') }}/{{ auth()->user()->photo_update }}" alt="" class="img-fluid rounded-circle">
                    @else
                    {{-- <img src="{{ asset('dashboard_assets') }}/profile_image/default_image.png" alt="" class="img-fluid rounded-circle"> --}}
                    <img src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" class="img-fluid rounded-circle" />
                    @endif

                </div>
                <div class="profile-details">
                    <div class="profile-name px-3 pt-2">
                        <h4 class="text-primary mb-0">{{ auth()->user()->name }}</h4>
                        <p>{{ auth()->user()->role }}</p>
                    </div>
                    <div class="profile-email px-2 pt-2">
                        <h4 class="text-muted mb-0">{{ auth()->user()->email }}</h4>
                        <p>Email</p>
                    </div>
                    <div class="dropdown ml-auto">
                        <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Change/Update Info,</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('data_update') }}" class="mb-3" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Full Name</label>
                            <input type="text" class="form-control" placeholder="Name" value="{{ auth()->user()->name }}" name="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Contact No</label>
                            <input type="tel" class="form-control" placeholder="Contact" name="phone_number" value="{{ auth()->user()->phone_number }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>E-mail Address</label>
                            <input type="email" class="form-control" placeholder="Email" value="{{ auth()->user()->email }}" name="email">
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Change/Password,</h4>
        </div>
        @if (session('password_success'))
             <div class="alert alert-success">
               {{session('password_success')}}
             </div>
         @endif
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('change.password') }}" class="mb-3" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Old Password</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" placeholder="old password"  name="current_password">
                            @error('current_password')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                           @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>New Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="new password" name="password" >
                            @error('password')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                           @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" placeholder="confirm password"  name="password_confirmation">
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>




<div class=" col-lg-12">
    <div class="card">
        <div class="card-header">
            Picture Upload
        </div>
        <div class="card-body">
            <form action="{{ route('image-upload') }}" class="mb-3" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="input-group mb-3 input-primary">
                        <input type="file" class="form-control" placeholder="Recipient's username" name="photo_update">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text">upload</button>
                        </div>
                    </div>
                </form>

        </div>
    </div>
</div>

@endsection

