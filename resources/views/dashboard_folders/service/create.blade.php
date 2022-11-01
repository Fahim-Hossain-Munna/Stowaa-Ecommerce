@extends('layouts.dashboard_master')

@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('service.index') }}">Service</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Service Add</a></li>
    </ol>
</div>

<div class="col-xl-12ar col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Added Services Info,</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('service.store') }}" class="mb-3" method="POST">
                   @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Service Name</label>
                            <input type="text" class="form-control"  name="service_name">
                        </div>
                        <div class="form-group col-md-12 ">
                            <label>Service Icon</label>
                            <input id="select_icon" type="text" class="form-control" name="service_icon" >

                        </div>
                        <div class="card bg-light">
                            <div class="card-header text-black">Select Icon From List,</div>
                            <div class="card-body text-dark" style="overflow-y: scroll; height:200px;">
                                   @foreach ($fonts as $font)
                                     <span class="badge badge-warning m-1 icon_pick" id="{{ $font }}">
                                         <i class=" fa-2x {{ $font }}"></i>
                                     </span>
                                   @endforeach

                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Service Description</label>
                            <textarea class="form-control" name="service_description"></textarea>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection



