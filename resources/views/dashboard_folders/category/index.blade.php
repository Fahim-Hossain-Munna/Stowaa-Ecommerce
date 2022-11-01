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
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>


                       @forelse ($categorys as $category)
                         <tr>
                             <td><strong>{{ $loop->index +1 }}</strong></td>
                             <td><div class="d-flex align-items-center"><span class="w-space-no">{{ $category->category_name }}</span></div></td>
                             <td>
                                <div class="d-flex">
                                    <a href="{{ route('category.show', $category->id) }}" class="btn btn-info shadow btn-sm sharp mr-1"> Details</a>
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary shadow btn-sm sharp mr-1">Edit</a>

                                    <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger shadow btn-sm sharp ">Delete</button>
                                    </form>
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

