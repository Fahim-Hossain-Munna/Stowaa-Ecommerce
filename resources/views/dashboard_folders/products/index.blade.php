@extends('layouts.dashboard_master')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Product Add</a></li>
    </ol>
</div>

    <div class="table-responsive">
        <table class="table table-bordered" id="example">
            <thead>
                <tr>
                    <th scope="col">SL No.</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Category</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Inventory</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>

               @forelse ($items as $item)
               <tr class="table-Secondary">

                     <td scope="row">{{ $loop->index +1 }}</td>
                     <td scope="row">{{ $item->product_name }}</td>
                     <td scope="row">{{ $item->product_regular_price }}</td>
                     <td scope="row" class="text-center"> <span class="badge bg-info"> {{ $item->CategoryTableRelation->category_name }} </span> </td>
                     {{-- App\Models\Category::find($item->category_id)->category_name --}}
                     <td scope="row">{{ $item->product_description }}</td>
                     <td scope="row"><div class="d-flex justify-content-center">@empty ($item->product_picture) <img src="{{ Avatar::create($item->product_name)->toBase64() }}" width="70" />  @else  <img src="{{ asset('all_images/vendor_products') }}/{{ $item->product_picture }}" class="rounded-lg mr-2" width="50" alt=""> @endempty</div></td>
                     <td scope="row"> <a href="{{ route('products.inventory.add' , $item->id ) }}" class="btn btn-info btn-sm"> Select Inventory </a> </td>
                     <td scope="row">
                        <form action="{{ route('products.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger shadow btn-sm sharp ">Delete</button>
                        </form>


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

@section('footer_script')
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>

@endsection
