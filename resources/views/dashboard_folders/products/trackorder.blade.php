@extends('layouts.dashboard_master')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Product Add</a></li>
    </ol>
</div>

    <div class="table-responsive">
        <table class="table table-bordered" id="oderTable">
            <thead>
                <tr>
                    <th scope="col">SL No.</th>
                    <th scope="col">Order Date.</th>
                    <th scope="col">Product Position</th>
                    <th scope="col">Product Oder Status</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Unit Price</th>
                    {{-- <th scope="col">Product Size</th>
                    <th scope="col">Product Color</th> --}}
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Product Payment</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>

                @forelse ($order_products as $product)
                <tr class="table-Secondary">

                      <td scope="row" class="text-center">{{ $loop->index+1 }}</td>
                      <td scope="row" class="text-center">{{ $product->created_at->toFormattedDateString() }}</td>
                      <td scope="row" class="text-center">
                        <form action="{{ route('products.order.track.post',$product->RelationWithInvoiceTable->id) }}" method="POST">
                            @csrf
                            <select class="custom-select" onchange="this.form.submit()" name="order_status">
                                <option selected>Open this select menu</option>
                                <option value="processing" {{$product->RelationWithInvoiceTable->order_status == 'processing' ? 'selected' : ''}}>processing</option>
                                <option value="shipped" {{$product->RelationWithInvoiceTable->order_status == 'shipped' ? 'selected' : ''}}>shipped</option>
                                <option value="out for delivery" {{$product->RelationWithInvoiceTable->order_status == 'out for delivery' ? 'selected' : ''}}>out for delivery</option>
                                <option value="delivered" {{$product->RelationWithInvoiceTable->order_status == 'delivered' ? 'selected' : ''}}>delivered</option>
                              </select>
                        </form>
                      </td>
                      <td scope="row" class="text-center">
                        {{$product->RelationWithInvoiceTable->payment_status}}
                      </td>

                      <td scope="row" class="text-center">{{ $product->RelationWithProductTable->product_name }}</td>
                      <td scope="row" class="text-center">{{ $product->unit_price }}</td>
                      <td scope="row" class="text-center">{{ $product->quantity }}</td>
                      <td scope="row" class="text-center">{{ $product->RelationWithInvoiceTable->payment_method }}</td>
                      <td scope="row" class="text-center">hola</td>
                </tr>
                <tr style="background: black; color:white">
                    <td colspan="9">
                        Customer Name : {{ $product->RelationWithInvoiceTable->customer_name }}<br>
                        Customer Address : {{ $product->RelationWithInvoiceTable->customer_address }}<br>
                        Customer Remark : {{ $product->RelationWithInvoiceTable->customer_remark }}<br>
                        Product Size : {{ $product->RelationWithSizeTable->size_name }}<br>
                        Product Color : {{ $product->RelationWithColorTable->color_name }} <span class="badge" style="background: {{ $product->RelationWithColorTable->color_code }}; width:20px; height:20px;">&nbsp</span> {{ $product->RelationWithColorTable->color_code }}<br>
                        Product Coupon : {{ $product->RelationWithInvoiceTable->coupon_name }}<br>
                        Product Shipping Charge : {{ $product->RelationWithInvoiceTable->shipping_charge }}
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


@endsection

{{-- @section('footer_script')
<script>
    $(document).ready(function () {
    $('#oderTable').DataTable();
});
</script>

@endsection --}}
