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
                            <td> {{ \Carbon\Carbon::parse($service->created_at)->diffForHumans() }} </td>
                        </tr>
                        <tr>
                            <td class="text-info">Service Name</td>
                            <td>{{ $service->service_name }}</td>
                        </tr>
                        <tr>
                            <td class="text-info">Service Description</td>
                            <td> {{ $service->service_description }} </td>
                        </tr>
                        <tr>
                            <td class="text-info">Service Current Icon</td>
                            <td> <i class="fa-4x text-warning {{$service->service_icon}}">  </i> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

