@extends('layouts.dashboard_master')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('service.index') }}">Service</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Service List</a></li>
    </ol>
</div>
<br>
<div class="row">
    @if (session('service_add'))
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    <p>{{ session('service_add') }}</p>
  </div>
@endif
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Services,</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive" >
                <table class="table table-responsive-md table-bordered ">
                    <thead>
                        <tr>
                            <th>ID NO.</th>
                            <th>NAME</th>
                            <th>ACTION</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>


                       @forelse ($services as $service)
                         <tr>
                             <td><strong>{{ $loop->index +1 }}</strong></td>
                             <td><div class="d-flex align-items-center"><span class="w-space-no">{{ $service->service_name }}</span></div></td>
                             <td>
                                <div class="d-flex">
                                    <a href="{{ route('service.show', $service->id) }}" class="btn btn-info shadow btn-sm sharp mr-1"> Details</a>
                                        <a href="{{ route('service.edit', $service->id) }}" class="btn btn-primary shadow btn-sm sharp mr-1">Edit</a>

                                    <form action="{{ route('service.destroy', $service->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger shadow btn-sm sharp ">Delete</button>
                                    </form>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                   @if ($service->status == 1)
                                     <a  href="{{ route('service.status', $service->id) }}" class="btn btn-success shadow btn-sm sharp mr-1"> Active</a>
                                   @else
                                   <a href="{{ route('service.status', $service->id) }}" class="btn btn-danger shadow btn-sm sharp mr-1"> Deactive</a>
                                   @endif
                                </div>
                            </td>

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

