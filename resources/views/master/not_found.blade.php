@extends('master/admin_layout')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-start">
                <div class="col-3 col-6">
                    <div class="small-box">
                        <div class="inner">
                            <h3>Not Found</h3>
                            <p>Not Found or Access Denied</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection