@extends('master/admin_layout')
{{-- cc@extends('master/admin_layout') --}}
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
            <div class="row">
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$data['category_count']}}</h3>
                            <p>Blog Categories</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ url('admin/category') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            {{-- <h3>53<sup style="font-size: 20px">%</sup></h3> --}}
                            <h3>{{$data['blogs_count']}}</h3>
                            <p>Total Blogs</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ url('admin/blog') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

             <div class="small-box bg-warning">
                          <div class="inner">
                            <h3>{{$data['active_blog_count']}}</h3>
                            <p>Active Blogs</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                </div>
{{--                 
                <div class="col-lg-3 col-6">

    <div class="small-box bg-maroon">
        <div class="inner">
            <h3>{{ $data['inactive_blog_count'] }}</h3>
            <p>Inactive Blogs</p>
        </div>

        <div class="icon">
            <i class="ion ion-close"></i>
        </div>

        <a href="{{ url('admin/blog') }}" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>

</div> --}}
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-maroon">
                        <div class="inner">
                            <h3>{{ $data['pending_blog_count'] }}</h3>
                            <p>Pending Blogs</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ url('admin/') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{$data['users_count']}}</h3>
                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ url('admin/users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-fuchsia">
                        <div class="inner">
                              <h3>{{ $data['total_views'] }}</h3>
                            <p>Total Views</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ url('admin/') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                                
                  <div class="col-lg-3 col-6">
                 <div class="small-box bg-olive">
                        <div class="inner">
                           <h3>{{ $data['comment_count'] }}</h3>
                            <p>Total Comments</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ url('admin/comment') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                  
                  
                  




            </div>
        </div>
    </section>

</div>
@endsection
