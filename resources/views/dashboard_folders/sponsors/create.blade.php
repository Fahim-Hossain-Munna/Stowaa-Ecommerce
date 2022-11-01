@extends('layouts.dashboard_master')

@section('content')

<div class="col-xl-12ar col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Spomsor Info,</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('sponsor.store') }}" class="mb-3" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Sponsor Name</label>
                            <input type="text" class="form-control" placeholder="Sponsor Name" name="sponsor_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Sponsor Photo</label>
                            <input type="file" class="form-control"   name="sponsor_photo">
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

