@extends('layouts.dashboard_master')


@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Admin Lists,</h4>
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Vendor Request Pending
                    </button>
                </div>
                <div class="card-body">
                                     <!-- Modal -->
                 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Vendors Request,</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive" style="font-size: 12px">
                                <table class="table able-responsive-sm table-bordered" style="font-size: 12px">
                                    <thead >
                                        <tr>
                                            <th>ID No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact No</th>
                                            <th>Request Sent</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                       @forelse ($vendors as $vendor)
                                         <tr>
                                             <td><strong>{{ $loop->index +1 }}</strong></td>
                                             <td><div class="d-flex align-items-center"><span class="w-space-no">{{ $vendor->name }}</span></div></td>
                                             <td>{{ $vendor->email }}</td>
                                             <td>{{ $vendor->phone_number }}</td>
                                             <td><div class="d-flex align-items-center">{{ \Carbon\Carbon::parse($vendor->created_at)->diffForHumans() }}</div></td>
                                             <td>@if ($vendor->status == 1)
                                                 <a href="{{ route('vendor.status',$vendor->id) }}" class="btn btn-success btn-sm">Active</a>
                                             @else
                                             <a href="{{ route('vendor.status',$vendor->id) }}" class="btn btn-danger btn-sm">Deactive</a>
                                             @endif</td>
                                             {{-- <td>
                                                 <div class="d-flex">
                                                     <a href="{{ route('profile') }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                     <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                 </div>
                                             </td> --}}
                                         </tr>
                                         @empty
                                         <tr>
                                            <td colspan="50" class="text-danger text-center"> No Data Found</td>
                                         </tr>
                                       @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>
                {{-- model End --}}
                </div>


                <div class="card-body">
                    <div class="table-responsive" >
                        <table class="table table-responsive-md table-bordered ">
                            <thead>
                                <tr>
                                    <th>ID NO.</th>
                                    <th>NAME</th>
                                    <th>Email</th>
                                    <th>CONTACT</th>
                                    <th>PROFILE IMAGE</th>
                                    <th>SINCE</th>
                                    <th>ROLE OF YOU</th>
                                    {{-- <th>ACTION</th> --}}
                                </tr>
                            </thead>
                            <tbody>


                               @forelse ($users as $admin)
                                 <tr>
                                     <td><strong>{{ $loop->index +1 }}</strong></td>
                                     <td><div class="d-flex align-items-center"><span class="w-space-no">{{ $admin->name }}</span></div></td>
                                     <td>{{ $admin->email }}</td>
                                     <td>{{ $admin->phone_number }}</td>
                                     <td> <div class="d-flex justify-content-center">@empty ($admin->photo_update) <img src="{{ Avatar::create($admin->name)->toBase64() }}" width="70" />  @else  <img src="{{ asset('profile_uploaded_image') }}/{{ $admin->photo_update }}" class="rounded-lg mr-2" width="50" alt=""> @endempty</div> </td>
                                     <td><div class="d-flex align-items-center">{{ \Carbon\Carbon::parse($admin->created_at)->diffForHumans() }}</div></td>
                                     <td>{{ $admin->role }}</td>
                                     {{-- <td>
                                         <div class="d-flex">
                                             <a href="{{ route('profile') }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                             <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                         </div>
                                     </td> --}}
                                 </tr>
                                 @empty
                                 <tr>
                                    <td colspan="50" class="text-danger text-center"> No Data Found</td>
                                 </tr>
                               @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- end --}}

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Promote Admin,</h4>
                </div>
                @error('admin_email')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
                @if (session('admin_add'))
                <div class="alert alert-success mt-1">{{ session('admin_add') }}</div>
                @endif
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('users.promote') }}" class="mb-3" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Admin Name</label>
                                    <input type="text" class="form-control"  name="admin_name" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Admin E-mail</label>
                                    <input type="text" class="form-control"  name="admin_email" placeholder="example@info.com">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Customers List,</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive" style="overflow-y: scroll; height:300px">
                <table class="table table-responsive-md table-bordered ">
                    <thead>
                        <tr>
                            <th>ID NO.</th>
                            <th>NAME</th>
                            <th>Email</th>
                            <th>CONTACT</th>
                            <th>PROFILE IMAGE</th>
                            <th>SINCE</th>
                            <th>ROLE OF YOU</th>
                            {{-- <th>ACTION</th> --}}
                        </tr>
                    </thead>
                    <tbody>


                       @forelse ($user_info as $users)
                         <tr>
                             <td><strong>{{ $loop->index +1 }}</strong></td>
                             <td><div class="d-flex align-items-center"><span class="w-space-no">{{ $users->name }}</span></div></td>
                             <td>{{ $users->email }}</td>
                             <td>{{ $users->phone_number }}</td>
                             <td> <div class="d-flex justify-content-center">@empty ($users->photo_update) <img src="{{ Avatar::create($users->name)->toBase64() }}" width="70" />  @else  <img src="{{ asset('profile_uploaded_image') }}/{{ $users->photo_update }}" class="rounded-lg mr-2" width="50" alt=""> @endempty</div> </td>
                             <td><div class="d-flex align-items-center">{{ \Carbon\Carbon::parse($users->created_at)->diffForHumans() }}</div></td>
                             <td>{{ $users->role }}</td>
                             {{-- <td>
                                 <div class="d-flex">
                                     <a href="{{ route('profile') }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                     <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                 </div>
                             </td> --}}
                         </tr>
                         @empty
                         <tr>
                            <td colspan="50" class="text-danger text-center"> No Data Found</td>
                         </tr>
                       @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
