@extends('layouts.dashboard_master')

@section('content')

@if (session('category_add'))
{{-- <div class="alert alert-success">{{ session('category_update') }}</div> --}}
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    <p>{{ session('category_add') }}</p>
  </div>
@endif

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Categories,</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive" >
                <table class="table table-responsive-md table-bordered ">
                    <thead>
                        <tr>
                            <th>ID NO.</th>
                            <th>NAME</th>
                            <th>SPONSOR IMAGE</th>
                            <th>ACTION</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>


                       @forelse ($sponsors as $sponsor)
                         <tr>
                             <td><strong>{{ $loop->index +1 }}</strong></td>
                             <td><div class="d-flex align-items-center"><span class="w-space-no">{{ $sponsor->sponsor_name }}</span></div></td>
                             <td><div class="d-flex align-items-center"> <img src="{{ asset('all_images/sponsors_images') }}/{{ $sponsor->sponsor_photo }}"> </div></td>
                             <td>
                                <div class="d-flex">
                                    {{-- <a href="{{ route('category.show', $sponsor->id) }}" class="btn btn-info shadow btn-sm sharp mr-1"> Details</a> --}}
                                        <a href="{{ route('sponsor.edit', $sponsor->id) }}" class="btn btn-primary shadow btn-sm sharp mr-1">Edit</a>

                                    <form action="{{ route('sponsor.destroy',$sponsor->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger shadow btn-sm sharp ">Delete</button>
                                    </form>
                                </div>
                            </td>
                            <td><div class="d-flex align-items-center"> @if ($sponsor->status == 1) <a href="{{ route('sponsor.status', $sponsor->id) }}" class="btn btn-success shadow btn-sm sharp mr-1">Active</a> @else <a href="{{ route('sponsor.status', $sponsor->id) }}" class="btn btn-danger shadow btn-sm sharp mr-1">Deactive</a>
                            @endif</div></td>

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

