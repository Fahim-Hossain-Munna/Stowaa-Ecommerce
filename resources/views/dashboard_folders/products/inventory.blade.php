@extends('layouts.dashboard_master')

@section('content')

<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            Input Inventory -
        </div>
        <div class="card-body">

                <form action="{{ route('products.inventory.post' , $inventory_product->id) }}" class="mb-3" method="POST">
                   @csrf
                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label>Check Available Size</label>
                            <select name="size_id" class="form-control col-md-6" id="category_search">
                                <option value="">-- Select Below Lists --</option>
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Check Available Color</label>
                            <select name="color_id" class="form-control col-md-6" id="category_search">
                                <option value="">-- Select Below Lists --</option>
                                @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                            @endforeach

                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Input Available Quantity</label>
                            <input type="text" class="form-control"  name="quantity">
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                <div class="table-responsive" >
                    <table class="table table-responsive-md table-bordered ">
                        <thead>
                            <tr>
                                <th>ID NO.</th>
                                <th>SIZE NAME</th>
                                <th>COLOR CODE</th>
                                <th>QUANTITY</th>
                                <th>TOTAL COST</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tbody>

                                @forelse ($inventories as $inventory)
                                  <tr>
                                      <td>{{ $loop->index + 1}}</td>
                                      <td>{{ $inventory->VariationSizeTableRelation->size_name }}</td>
                                      <td> <span class="badge" style="background: @if($inventory->VariationColorTableRelation->color_code) {{ $inventory->VariationColorTableRelation->color_code }}  @endif ; width:20px; height:20px;">&nbsp</span> @if ($inventory->VariationColorTableRelation->color_name)
                                        {{ $inventory->VariationColorTableRelation->color_name}}
                                      @endif</td>
                                      <td>
                                        {{ $inventory->quantity }}
                                      </td>
                                      <td>
                                        {{ $inventory_product->product_regular_price * $inventory->quantity }}
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




