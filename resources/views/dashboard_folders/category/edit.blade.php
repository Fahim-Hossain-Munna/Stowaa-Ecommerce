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
                <form action="{{ route('category.update', $categorys->id) }}" class="mb-3" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Categorty Name</label>
                            <input type="text" class="form-control" value="{{ $categorys->category_name }}" name="category_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Categorty Slug</label>
                            <input type="text" class="form-control" value="{{ $categorys->category_slug }}" name="category_slug" >
                        </div>
                        <div class="form-group col-md-6">
                            <label>Categorty Current Photo</label>
                            <img src="{{ asset('all_images/category_pictures') }}/{{ $categorys->category_photo }}" width="125" class="ml-2">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Categorty Photo</label>
                            <input type="file" class="form-control" name="category_photo" >
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

