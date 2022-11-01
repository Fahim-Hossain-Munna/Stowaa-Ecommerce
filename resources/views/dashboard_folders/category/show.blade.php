@extends('layouts.dashboard_master')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Individual Details,</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive" >
                <table class="table table-responsive-md table-bordered ">

                    <tbody>
                        <tr>
                            <td class="text-info">Category Submited</td>
                            <td> {{ \Carbon\Carbon::parse($categorys->created_at)->diffForHumans() }} </td>
                        </tr>
                        <tr>
                            <td class="text-info">Category Name</td>
                            <td>{{ $categorys->category_name }}</td>
                        </tr>
                        <tr>
                            <td class="text-info">Category Slug</td>
                            <td> {{ $categorys->category_slug }} </td>
                        </tr>
                        <tr>
                            <td class="text-info">Category Current Photo</td>
                            <td> <img src="{{ asset('all_images/category_pictures') }}/{{ $categorys->category_photo }}" width="75"> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

