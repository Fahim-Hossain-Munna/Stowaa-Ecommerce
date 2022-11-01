@extends('layouts.dashboard_master')

@section('content')

@if (session('category_update'))
{{-- <div class="alert alert-success">{{ session('category_update') }}</div> --}}
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    <p>{{ session('category_update') }}</p>
  </div>
@endif

<div class="col-xl-12ar col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Update Category Info,</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('sponsor.update', $sponsors->id) }}" class="mb-3" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Sponsor Name</label>
                            <input type="text" class="form-control" value="{{ $sponsors->sponsor_name}}" name="sponsor_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Sponsor Current Photo</label>
                            <br>
                            <img src="{{ asset('all_images/sponsors_images') }}/{{ $sponsors->sponsor_photo }}" width="200" class="ml-2">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Categorty Photo</label>
                            <input type="file" class="form-control" name="sponsor_photo" >
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

