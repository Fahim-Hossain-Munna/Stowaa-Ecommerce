@extends('layouts.dashboard_master')

@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Coupon List</a></li>
    </ol>
</div>

<livewire:coupon-genarate />


@endsection
