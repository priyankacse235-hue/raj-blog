@extends('master/admin_layout')
@section('content')
<div class="content-wrapper">
    @include('master.layout.message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Customers Detials</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Happy Customers</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <form method="post" action="{{ route('happy-customers.update', $customer->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-header bg-info">
                        <h3 class="card-title">Update Happy Customer</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="customer_name">Customer Name</label>
                                <input type="text" id="customer_name" class="form-control" name="customer_name" value="{{ $customer->customer_name }}">
                            </div>
                            <div class="col-md-6">
                                <label for="designation">Designation</label>
                                <input type="text" id="designation" class="form-control" name="designation" value="{{ $customer->designation }}">
                            </div>
                            <div class="col-md-3">
                                <label for="profile">Profile</label>
                                <input type="file" class="form-control" accept="image/*" name="profile">
                            </div>
                            <div class="col-md-6">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" >{{ $customer->description }}</textarea>
                                <input type="text" class="form-control" >
                            </div>
                            <div class="col-md-3">
                                <label for="Profile">Profile Preview</label>
                                <img src="{{ url('storage/'.$customer->profile) }}">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button class="btn btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection

@section('js_content')
@endsection