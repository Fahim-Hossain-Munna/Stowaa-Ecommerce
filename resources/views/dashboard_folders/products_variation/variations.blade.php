@extends('layouts.dashboard_master')

@section('content')



    <!--**********************************
            yield body start
        ***********************************-->
    <div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/service">Service</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Service List</a></li>
    </ol>
</div>

<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            Add Size
        </div>
        <div class="card-body">

                <form action="{{ route('products.size.variation') }}" class="mb-3" method="POST">
                   @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Product Size</label>
                            <input type="text" class="form-control"  name="size_name">
                        </div>
                        {{-- <div class="form-group col-md-12">
                            <label></label>
                            <textarea class="form-control" name="service_description"></textarea>
                        </div> --}}

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                <div class="table-responsive" >
                    <table class="table table-responsive-md table-bordered ">
                        <thead>
                            <tr>
                                <th>ID NO.</th>
                                <th>SIZES</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($sizes as $size)
                             <tr>
                                 <td>{{ $loop->index + 1}}</td>
                                 <td>{{ $size->size_name }}</td>
                                 <td>
                                    {{-- <form action="{{ route('products.destroy',$size->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger shadow btn-sm sharp ">Delete</button>
                                    </form> --}}
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

<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            Add Size
        </div>
        <div class="card-body">

                <form action="{{ route('products.color.variation') }}" class="mb-3" method="POST">
                   @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Color Name</label>
                            <input type="text" class="form-control"  name="color_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Color Code</label>
                            <input type="color" class="form-control"  name="color_code">
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                <div class="table-responsive" >
                    <table class="table table-responsive-md table-bordered ">
                        <thead>
                            <tr>
                                <th>ID NO.</th>
                                <th>COLOR NAME</th>
                                <th>COLOR CODE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tbody>
                                @forelse ($colors as $color)
                                  <tr>
                                      <td>{{ $loop->index + 1}}</td>
                                      <td>{{ $color->color_name }}</td>
                                      <td> <span class="badge" style="background: {{$color->color_code}}; width:20px; height:20px;">&nbsp</span> {{ $color->color_code }}</td>
                                      <td>
                                        {{-- <form action="{{ route('products.destroy',$color->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger shadow btn-sm sharp ">Delete</button>
                                        </form> --}}
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


                    <!--**********************************
                            yield body end
                        ***********************************-->


@endsection
