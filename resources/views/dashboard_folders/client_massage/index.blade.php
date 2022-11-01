@extends('layouts.dashboard_master')

@section('content')

<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('service.index') }}">Client Massages</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Massages List</a></li>
        </ol>
    </div>
    @if (session('contact_delete'))
     <div class="alert alert-success">
       {{session('contact_delete')}}
    </div>
      @endif

    <div class="row">
      @foreach ($massages as $massage)
          <div class="col-xl-6">
              <div class="card">
                  <div class="card-header border-0 pb-0">
                      <h5 class="card-title">{{ $massage->contact_name }}</h5>
                  </div>
                  <div class="card-body">
                    <p class="card-text">E-mail : {{ $massage->contact_email }}</p>
                    <p class="card-text">Subject : {{ $massage->contact_subject }}</p>
                    <p class="card-text">Comment : {{ $massage->contact_message }}</p>
                  </div>
                  <div class="card-footer border-0 pt-0">
                      <form action="{{ route('client-massage.destroy',$massage->id) }}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="card-link float-right btn btn-danger">Delete</button>
                    </form>
                  </div>
              </div>
          </div>
      @endforeach
    </div>
</div>

@endsection

