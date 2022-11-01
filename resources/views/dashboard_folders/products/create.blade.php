@extends('layouts.dashboard_master')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Product</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Product Add</a></li>
    </ol>
</div>

<div class="col-xl-12ar col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Added Products Info,</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('products.store') }}" class="mb-3" method="POST" enctype="multipart/form-data">
                   @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Product Name</label>
                            <input type="text" class="form-control"  name="product_name">
                        </div>
                        <div class="form-group col-md-12 ">
                            <label>Product Category Lists</label>
                            <select name="category_id" class="form-control" id="category_search">
                                <option value="">-- Select Below Lists --</option>
                                @foreach ($cetegories as $cetegory)
                                    <option value="{{ $cetegory->id }}">{{ $cetegory->category_name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group col-md-12 ">
                            <label>Product Regular Price</label>
                            <input  type="text" class="form-control" name="product_regular_price" >

                        </div>
                        <div class="form-group col-md-12 ">
                            <label>Product Discunted Price</label>
                            <input  type="text" class="form-control" name="product_discunted_price" >

                        </div>
                        <div class="form-group col-md-12">
                            <label>Product Description</label>
                            <textarea class="form-control" name="product_description"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Product Short Description</label>
                            <textarea class="form-control" name="product_short_description"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Product Additional Description</label>
                            <textarea class="form-control" name="product_additional_description"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Product Image</label>
                            <input type="file" class="form-control" name="product_picture" >
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
<script>
    $(document).ready(function() {
    $('#category_search').select2();
});
</script>
@endsection








