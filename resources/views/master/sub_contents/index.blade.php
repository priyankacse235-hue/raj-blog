@extends('master/admin_layout')
@section('content')
<div class="content-wrapper">
    @include('master.layout.message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Sub Content Of {{ $blog_data->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/blog') }}" class="btn btn-sm btn-warning">Back</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                All Contents
                            </h3>
                            <div class="card-tools">
                                <a href="{{ url('admin/blog_content/create/'.$blog_data->id) }}" class="btn btn-sm btn-info">{{ count($blogs) > 0 ? 'Add More Sub Content' : 'Add New Sub Content' }}</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>SNO</th>
                                        <th>Heading</th>
                                        <th>Contents</th>
                                        <th>Image</th>
                                        <th>Creation Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <thead>
                                    @if (count($contents) > 0)
                                        @foreach ($contents as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->heading }}</td>
                                                <td>{!! substr($item->content, 0, 200) !!}</td>
                                                <td>
                                                    <img style="width:80px;" src="{{ asset('storage/'.$item->image) }}" alt="Banner Image">
                                                </td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    @if ($item->show)
                                                        <a href="{{ url('admin/content_status/'.$item->id) }}" class="btn btn-danger btn-xs">Deactive</a>
                                                    @else
                                                        <a href="{{ url('admin/content_status/'.$item->id) }}" class="btn btn-info btn-xs">Active</a>
                                                    @endif
                                                    <a href="{{ url('admin/blog_content/edit/'.$item->id.'/'.$blog_data->id) }}" class="fa fa-edit btn btn-warning"></a>
                                                    <a href="{{ url('admin/content_delete/'.$item->id) }}" class="fa fa-trash-alt btn btn-danger" onclick='return confirm("Are you sure to delete this!")'></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center">Sub Content Not Found In This Blog</td>
                                        </tr>
                                    @endif
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection