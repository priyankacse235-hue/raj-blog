@extends('master/admin_layout')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active">Users</li>
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
                                All Users Here
                            </h3>
                        </div>
                        <div class="card-body">
                            <table id="data_table" class="table table-bordered table-hover table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>SNO</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($all_users) > 0)
                                        @foreach ($all_users as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td class="user-panel">
                                                    @if (Auth::user()->profile_photo_path)
                                                        <img class="img-circle elevation-2" alt="user image" src="{{ url('storage/',Auth::user()->profile_photo_path) }}" />
                                                    @else  
                                                        <img src="{{url('images/user.png')}}" /></div>&nbsp;
                                                    @endif
                                                    <b>{{ ucfirst($item->name) }}</b>
                                                </td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ substr($item->created_at, 0, 10) }}</td>
                                                <td>
                                                    @if ($item->active == 0)
                                                        <a href="{{ url('admin/user/status/'.$item->id) }}" title="Currently Deactive" class="btn btn-warning">Active</a>
                                                    @else
                                                        <a href="{{ url('admin/user/status/'.$item->id) }}" title="Currently Active" class="btn btn-danger">Deactive</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('js_content')
    <script>
         $("#data_table").DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                buttons: [],
                pageLength: 20
            })
            .buttons()
            .container()
            .appendTo("#example1_wrapper .col-md-6:eq(0)");
    </script>
@endsection

